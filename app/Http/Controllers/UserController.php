<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordEmail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view("users/register", [
            "title" => "Leno Files :: Sign Up"
        ]);
    }

    // Show login form
    public function login() {
        return view("users/login", [
            "title" => "Leno Files :: Login"
        ]);
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            "firstname" => ["required", "min:3", "max:30"],
            "lastname" => ["required", "min:3", "max:30"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            //"password" => ["required", "confirmed", "min:6"]
            "password" => "required|confirmed|min:6"
        ]);

        $formFields["firstname"] = ucfirst($formFields["firstname"]); // make the first letter capital
        $formFields["lastname"] = ucfirst($formFields["lastname"]); // make the first letter capital

        // Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        // Create User
        $user = User::create($formFields);

        //if user was not created
        if(!$user) {
            

            return redirect("/register")->with("error", "There was an error in creating your account. Please try again");
        } else {

            // Login the user
            auth()->login($user);

            session()->flash("success", "Your account has been created and you are now logged in");
            return redirect("/users/upload_file");
        }
    }

    // Show profile form
    public function profile() {

        $user_details = User::find(auth()->id());

        return view("users/profile", [
            "title" => "Leno Files :: User",
            "user_details" => $user_details
        ]);
    }

    // Show edit profile form
    public function edit_profile() {

        $user_details = User::find(auth()->id());

        return view("users/edit_profile", [
            "title" => "Leno Files :: User",
            "user_details" => $user_details
        ]);
    }

    // Update User's profile first and last names
    public function update_profile_name(Request $request) {

        $user = User::find(auth()->id());

        $formFields = $request->validate([
            "firstname" => ["required", "min:3", "max:30"],
            "lastname" => ["required", "min:3", "max:30"],
        ]);

        $formFields["firstname"] = ucfirst($formFields["firstname"]);
        $formFields["lastname"] = ucfirst($formFields["lastname"]);

        $user->update($formFields); // update the user's name

        session()->flash("success", "Your name has been changed successfully!");

        return back();
    }
    
    // Update User's profile Email
    public function update_profile_email(Request $request) {

        $user = User::find(auth()->id());

        $formFields = $request->validate([
            "email" => ["required", "email", Rule::unique("users", "email")],
        ]);

        $user->update($formFields); // update the user's email

        session()->flash("success", "Your email has been changed successfully!");

        return back();
    }

    // Update User's profile Email
    public function update_profile_password(Request $request) {

        $user = User::find(auth()->id());

        $formFields = $request->validate([
            "old_password" => ["required", "min:6"],
            "password" => "required|confirmed|min:6"
        ]);
    
        // Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        foreach($user as $u) {
            //If the old password is wrong or invalid
            //redirect back to profile page
            if(!password_verify($formFields["old_password"], $user["password"])) {

                session()->flash("error", "Wrong old password inputted");

                return back();
            }
        }

        $user->password = $formFields["password"];
        $user->save(); // save the user's new password

        return back()->with("success", "Your password has been changed successfully!");
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate(); //important for logout
        $request->session()->regenerateToken(); //important to do this for csrf token during logout

        return redirect("/")->with("success", "You have been logged out!");
    }

    //Authenticate user after login
    public function authenticate(Request $request) {

        
        $formFields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            session()->flash("success", "You are now logged in!");

            return redirect("/");
        }

        return back()->withErrors([
            "email" => "Invalid Credentials"
        ])->onlyInput("email");
    }

    // Forgot password form
    public function forgot_password() {
        return view("users/forgot_password", [
            "title" => "Leno Files :: Forgot Password"
        ]);
    }

    // Send newly generated password to the user's email
    public function send_password(Request $request) {

        // Still looking for an email service that I will use for this project
        // so for now, it is still been worked on
        // so redirect back to the forgot_password page/route
        return redirect("/forgot_password");

        $formFields = $request->validate([
            "email" => ["required", "email"]
        ]);

        $user_details = User::where("email", $formFields["email"])->first(); //use this instead of get() because update does not work with get(), only things like first() or User::find($id)
        
        if(empty($user_details)) {

            session()->flash("error", "No account found!");

            return redirect("/forgot_password");
        }

        $user_email = $formFields["email"];

        $randomStringNewPassword = Str::random(8);

        //$randomStringNewPasswordBcryptHash = bcrypt($randomStringNewPassword);

        $mailData = [
            "new_password" => $randomStringNewPassword
        ];

        Mail::to($user_email)->send(new ForgotPasswordEmail($mailData)); // send the new password to the user's email

        if(count(Mail::failures()) > 0 ) {

            session()->flash("error", "There was an error resetting your password. Please try again.");

            return redirect("/forgot_password");
         
         } else {

            /** if the email went successfully, save the new password to the database */

            // Hash Password
            $formFields["password"] = bcrypt($randomStringNewPassword);

            $user_details->update($formFields); //update the password

            session()->flash("success", "A new password has been sent to your email.");

            return redirect("/login");
        }
    }
}
