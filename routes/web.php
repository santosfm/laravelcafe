<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactControllerTwo;
use App\Http\Controllers\CaptchaValidationController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail; 

//use App\Http\Controllers\VerifyEmailController; 
//use Illuminate\Auth\Events\Verified; ///////////
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//EMAIL VERIFICATION. It verifies a user's email after registration
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

//resends the email to the user
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Route::get("/",[HomeController::class,"index"]);  //ORIGINAL
Route::get("/",[HomeController::class,"index"])->name('home'); //->middleware('verified');
Route::get("/users",[AdminController::class,"user"]);
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::get("/updateview/{id}",[AdminController::class,"updateview"]);
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::post("/reservation",[AdminController::class,"reservation"]);
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::post("/uploadfood",[AdminController::class,"upload"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);

//redirects page can only be accessed if user has verified the account
Route::get("/redirects",[HomeController::class,"redirects"])->middleware('verified');
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);
Route::get("/viewchef",[AdminController::class,"viewchef"]);
Route::get("/updatechef/{id}",[AdminController::class,"updatechef"]);
Route::post("/updatefoodchef/{id}",[AdminController::class,"updatefoodchef"]);
Route::get("/deletechef/{id}",[AdminController::class,"deletechef"]);
Route::post("/uploadchef",[AdminController::class,"uploadchef"]);
Route::post("/addcart/{id}",[HomeController::class,"addcart"]);

//showcart page can only be accessed if user has verified the account
Route::get("/showcart/{id}",[HomeController::class,"showcart"])->middleware('verified');
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/search",[AdminController::class,"search"]);

//USED FOR THE CONTACT FORM
Route::get('/contact-us', [ContactController::class, 'contact']);
Route::post('/send-message',[ContactController::class,'sendEmail'])->name('contact.send');

//CAPTCHA   
//Route::get('contact-us', [ContactController::class, 'contact']);
Route::get('reload-captcha', [ContactController::class, 'reloadCaptcha']);
//END OF CAPTCHA

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
