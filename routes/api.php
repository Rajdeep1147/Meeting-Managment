<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Notification;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('student', MemberController::class);

Route::post('user', function () {
    return response()->json('This is Post Api');
});

Route::delete('/user/{id}', function ($id) {
    return response("$id Hello Delete", 200);
});

Route::put('/user/{id}', function ($id) {
    return response("$id Hello put", 200);
});

Route::post('user/create', [UserController::class, 'store']);

Route::get('user/get/{flag}', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::delete('user/{id}', [UserController::class, 'destroy']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::patch('change-password/{id}', [UserController::class, 'changePassword']);

Route::get('collapse', [UserController::class, 'collapse']);
Route::get('map', [UserController::class, 'map']);
Route::get('filter', [UserController::class, 'filter']);
Route::get('group', [UserController::class, 'groupBy']);
Route::get('where', [UserController::class, 'where']);
Route::get('test-trait', [UserController::class, 'testTrait']);

Route::get('post', [PostController::class, 'index']);

Route::get('student', [StudentController::class, 'dis']);

Route::get('eluquent-test', [PostController::class, 'eluqu']);

Route::get('collect', [PostController::class, 'collectInfo']);

Route::prefix('book-class')->group(function () {
    Route::get('booking', [ClassesController::class, 'booking'])->name('booking');
    Route::post('bookclass/{class}', [ClassesController::class, 'bookclass'])->name('book.slote');

});

Route::resource('classes', ClassesController::class);
Route::resource('slot', SlotController::class);

Route::middleware('auth:student')->group(function () {

});

Route::get('notification',[NotificationController::class,'sendNotification'])->name('send.notification');