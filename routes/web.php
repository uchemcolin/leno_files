<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// Home page
Route::get("/", [FileController::class, "index"]);

// Home page
Route::get("/test_send_email", [FileController::class, "test_send_email"]);

// Users Sign Up page
Route::get("/register", [UserController::class, "create"])->middleware("guest");

// Users login page
Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");

// Log User Out
Route::post("/logout", [UserController::class, "logout"])->middleware("auth");

// Forgot password page
Route::get("/forgot_password", [UserController::class, "forgot_password"])->middleware("guest");

// Send a newly generated password to the user's email in a place where he/she forgot his/her password
Route::post("/send_password", [UserController::class, "send_password"])->middleware("guest");

// Store the user during login
Route::post("/users/store", [UserController::class, "store"])->middleware("guest");

// Authenticate the user during login
Route::post("/users/authenticate", [UserController::class, "authenticate"])->middleware("guest");

// Show User profile form
Route::get("/users/profile", [UserController::class, "profile"])->middleware("auth");

// Show User profile form
Route::get("/users/edit_profile", [UserController::class, "edit_profile"])->middleware("auth");

// Show User's files
Route::get("/users/files", [FileController::class, "manage_files"])->middleware("auth");

// Show User's files
Route::post("/users/files", [FileController::class, "manage_files"])->middleware("auth");

// Update user's name
Route::post("/users/update_profile_name", [UserController::class, "update_profile_name"])->middleware("auth");

// Update user's email
Route::post("/users/update_profile_email", [UserController::class, "update_profile_email"])->middleware("auth");

// Update user's password
Route::post("/users/update_profile_password", [UserController::class, "update_profile_password"])->middleware("auth");

// Show User profile form
Route::get("/users/edit_profile", [UserController::class, "edit_profile"])->middleware("auth");

// View File form page
//Route::get("/users/view_file/{file}", [FileController::class, "view_file"])->middleware("auth");
//Route::get("/users/view_file/{file}", [FileController::class, "view_file"])->middleware("guest");
Route::get("/files/view_file/{file}", [FileController::class, "view_file"]);

// Upload File form page
Route::get("/users/upload_file", [FileController::class, "create"])->middleware("auth");

// Upload File form page
Route::post("/users/upload_file", [FileController::class, "store"])->middleware("auth");

// Delete File
Route::delete("/users/{file}", [FileController::class, "destroy"])->middleware("auth");

