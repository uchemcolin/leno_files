<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileControllerForApi;
use App\Http\Controllers\UserControllerForApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Get a File details
//Route::get("/files/view_file/{file}", [FileControllerForApi::class, "view_file"]);

// Send a newly generated password to the user's email in a place where he/she forgot his/her password
//Route::post("/send_password", [UserControllerForApi::class, "send_password"])->middleware("guest");

// Still looking for an email service that I will use for this project
// so for now, it is still been worked on
// so the route should not exist for now until it has been built and is good to go
//Route::post("/send_password", [UserControllerForApi::class, "send_password"]);

// Store the user during new account creation
//Route::post("/users/store", [UserControllerForApi::class, "store"]);
Route::post("/register", [UserControllerForApi::class, "register"]);

// Authenticate the user during login
//Route::post("/users/authenticate", [UserControllerForApi::class, "authenticate"]);
Route::post("/login", [UserControllerForApi::class, "login"]);

/*
//For individual route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Protected routes/routes that need authentication
Route::group(["middleware" => ["auth:sanctum"]], function() {
    // Log User Out
    Route::post("/logout", [UserControllerForApi::class, "logout"]);

    // Show User profile form
    Route::get("/users/profile", [UserControllerForApi::class, "profile"]);

    // Show User's files
    //Route::get("/users/files", [FileControllerForApi::class, "manage_files"]);

    // Show User's files
    Route::post("/users/files", [FileControllerForApi::class, "manage_files"]);

    // Update user's name
    Route::post("/users/update_profile_name", [UserControllerForApi::class, "update_profile_name"]);

    // Update user's email
    Route::post("/users/update_profile_email", [UserControllerForApi::class, "update_profile_email"]);

    // Update user's password
    Route::post("/users/update_profile_password", [UserControllerForApi::class, "update_profile_password"]);

    // Upload File form page
    Route::post("/users/upload_file", [FileControllerForApi::class, "store"]);

    // Delete File
    Route::delete("/users/{file}", [FileControllerForApi::class, "destroy"]);

    // View File form page
    Route::get("/files/view_file/{file}", [FileControllerForApi::class, "view_file"]);
});
