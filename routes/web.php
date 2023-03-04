<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\MemberController;
use App\Jobs\SendEmailJob;



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

Route::get('/get-data',[TestController::class,'getData'])->name('get.data');


Route::get('/', function () {
   return view('welcome');
});

Route::get('auth/google',[GoogleController::class,'loginWithGoogle'])->name('google.login');
Route::get('auth/google/callback',[GoogleController::class,'callBackFromGoogle'])->name('google.callback');

Route::get('home',function(){
    return view('home');
})->name('home');

// Route::get('/test',[TestController::class,'index']);
Route::prefix('my')->group(function (){
    Route::get('test',[TestController::class,'index'])->name('test');
    Route::get('facade-test',[TestController::class,'facadeInfo'])->name('facade.test');
});


// // Route For Login
Route::get('/',[UserController::class,'loadLogin']);
Route::post('/login',[UserController::class,'userLogin'])->name('user.login');

// // Route For Login
Route::get('/register',[UserController::class,'loadRegister']);
Route::post('/register',[UserController::class,'userRegister'])->name('user.Register');

// // Route For Logout
Route::get('/logout',[UserController::class,'logout']);

// Route For Home
Route::get('/home',[UserController::class,'home']);

Route::get('/main',[UserController::class,'main']);
Route::get('/user',[StripePaymentController::class,'onetime'])->name('onetime');

// Stripe Route Grouping Start
Route::prefix('stripe')->group(function () {
    Route::post('/test',[StripePaymentController::class,'stripePay'])->name('stripe.pay');
    Route::post('/user',[StripePaymentController::class,'submitForm'])->name('makepayment');
    
});
// Stripe Route Grouing End

// Ajax Route Grouping
Route::prefix('ajax')->group(function(){
    Route::get('register',[AjaxController::class,'ajaxRegister'])->name('ajax.register');
    Route::post('register',[AjaxController::class,'ajaxRegisterPost'])->name('ajax.register.post');
    Route::get('users',[AjaxController::class,'allUsers'])->name('ajax.users');
    Route::put('edit-user/{id?}',[AjaxController::class,'editUsers'])->name('ajax.edit.users');
    Route::post('delete-user/{id?}',[AjaxController::class,'deleteUsers'])->name('ajax.delete.users');
    
    // Routes For Searching
    Route::get("/search",[AjaxController::class,'productSearching'])->name('search');
    Route::get("/search",[AjaxController::class,'tableSearching'])->name('search');

});
// Ajax Route Grouping End 

// Route For Phone OTP

Route::get('send-mail',function(){
    $userMail = 'rajdeeprangra@gmail.com';
    dispatch(new SendEmailJob($userMail));
    dd('Send Mail Successfully');
});
