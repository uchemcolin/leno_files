<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Laravel\Sanctum\Sanctum;

class UserControllerForApi extends Controller
{
    // Create New User
    public function register(Request $request) {

        $formFields = $request->validate([
            "firstname" => ["required", "min:3", "max:30"],
            "lastname" => ["required", "min:3", "max:30"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            //"password" => ["required", "confirmed", "min:6"]
            "password" => "required|confirmed|min:6"
        ]);
        
        $formFields["firstname"] = ucfirst($formFields["firstname"]);
        $formFields["lastname"] = ucfirst($formFields["lastname"]);

        // Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);

        // Create User
        $user = User::create($formFields);

        // create token to be used by app for authentication
        // for routes that require you to be logged in
        // before you can visit them
        $token =  $user->createToken('MyApp')->plainTextToken;

        $response = [
            "user" => $user,
            "message" => [
                "type" => "success",
                "text" => "Your account has been created and you are now logged in",
                //"token" => $token->plainTextToken
                "token" => $token
            ]
        ];

        return response(
            $response,
            201 // 201 status code meaning everything went smooth and there was no error
        );
    }

    // Show profile form
    public function profile() {

        $user_details = User::find(auth()->id());

        $response = [
            "user" => $user_details
        ];

        return response(
            $response,
            200 // 200 status code (similar to 201 but not exactly the same, this one is just for retrieving something, no update of info been done) meaning everything went smooth and there was no error
        );
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

        /** Have to use try and catch for api incase it did not 
         * update successfully, it will notify the users
         * say the name was not updated successfully
         * Used it for app for the app to be more accurate in
         * telling if it went smoothly as it is not running
         * on the web browser that can easily indicate an error
         */
        try {
            $user->update($formFields);

            $response = [
                "user" => $user,
                "message" => [
                    "type" => "success",
                    "text" => "Your name has been changed successfully!"
                ]
            ];
    
            return response(
                $response,
                201 // 201 status code meaning everything went smooth and there was no error
            );
        }
        
        catch (\Exception $e) { // I don't remember what exception it is specifically, but it catches an exception
        

            $response = [
                "user" => $user,
                "message" => [
                    "type" => "error",
                    "text" => "An error occured, please try again."
                ]
            ];
    
            return response(
                $response,
                500
            );
        
        }
    }
    
    // Update User's profile Email
    public function update_profile_email(Request $request) {

        $user = User::find(auth()->id());

        $formFields = $request->validate([
            "email" => ["required", "email", Rule::unique("users", "email")],
        ]);

        $formFields["email"] = strtolower($formFields["email"]);

        /** Have to use try and catch for api incase it did not 
         * update successfully, it will notify the users
         * say the name was not updated successfully
         * Used it for app for the app to be more accurate in
         * telling if it went smoothly as it is not running
         * on the web browser that can easily indicate an error
         */
        try {
            $user->update($formFields);

            $response = [
                "user" => $user,
                "message" => [
                    "type" => "success",
                    "text" => "Your email has been changed successfully!"
                ]
            ];
    
            return response(
                $response,
                201 // 201 status code meaning everything went smooth and there was no error
            );
        }
        
        catch (\Exception $e) { // I don't remember what exception it is specifically, but it catches an exception
        
            $response = [
                "user" => $user,
                "message" => [
                    "type" => "error",
                    "text" => "An error occured, please try again."
                ]
            ];
    
            return response(
                $response,
                500
            );
        
        }
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
            //return error with the message
            if(!password_verify($formFields["old_password"], $user["password"])) {

                $response = [
                    "user" => $user,
                    "message" => [
                        "type" => "error",
                        "text" => "Wrong old password inputted."
                    ]
                ];
        
                return response(
                    $response,
                    500
                );
            }
        }

        /** Have to use try and catch for api incase it did not 
         * update successfully, it will notify the users
         * say the name was not updated successfully
         * Used it for app for the app to be more accurate in
         * telling if it went smoothly as it is not running
         * on the web browser that can easily indicate an error
         */
        try {
            $user->password = $formFields["password"];
            $user->save();

            $response = [
                "user" => $user,
                "message" => [
                    "type" => "success",
                    "text" => "Your password has been changed successfully!"
                ]
            ];
    
            return response(
                $response,
                201 // 201 status code meaning everything went smooth and there was no error
            );
        }
        
        catch (\Exception $e) { // I don't remember what exception it is specifically
        
            $response = [
                "user" => $user,
                "message" => [
                    "type" => "error",
                    "text" => "An error occured, please try again."
                ]
            ];
    
            return response(
                $response,
                500
            );
        
        }
    }

    // Logout User
    public function logout(Request $request) {

        /** Have to use try and catch for api incase it did not 
         * update successfully, it will notify the users
         * say the name was not updated successfully
         * Used it for app for the app to be more accurate in
         * telling if it went smoothly as it is not running
         * on the web browser that can easily indicate an error
         */
        try {
            auth()->user()->tokens()->delete(); // delete the user's logged in tokens

            $response = [
                "message" => [
                    "type" => "success",
                    "text" => "You have logged out!"
                ]
            ];
    
            return response(
                $response,
                200
            );
        }
        
        catch (\Exception $e) { // I don't remember what exception it is specifically
        
            $response = [
                "message" => [
                    "type" => "error",
                    "text" => "An error occured, please try again."
                ]
            ];
    
            return response(
                $response,
                500
            );
        
        }
    }

    // Login User
    public function login(Request $request) {
        
        $formFields = $request->validate([
            "email" => ["required", "email"],
            //"password" => ["required", "confirmed", "min:6"]
            "password" => "required|min:6"
        ]);

        // attempt to login the user using the email and password provided via the api
        if(Auth::attempt(['email' => $formFields["email"], 'password' => $formFields["password"]])){ 
            $user = Auth::user();

            $token =  $user->createToken('MyApp')->plainTextToken; // create a login token for the user on the app on the device
   
            $response = [
                "user" => $user,
                "type" => "success",
                "message" => "You are now logged in!",
                "token" => $token
            ];

            return response(
                $response,
                201 // 201 status code meaning everything went smooth and there was no error
            );

        } else {
            return response([
                "type" => "error",
                "message" => "Bad credentials"
            ], 401);
        }
    }
}