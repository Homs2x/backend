<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LetterController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


 
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name("user.login");
Route::post('/logout', 'logout');
});



Route::controller(CarouselItemController::class)->group(function () {
Route::get('/carousel', 'index');
Route::get('/carousel/{id}', 'show');
Route::post('/carousel', 'store');
Route::put('/carousel/{id}', 'update');
Route::delete('/carousel/{id}', 'destroy');
});




Route::get('/user',[UserController::class, 'index']);
Route::get('/user/{id}',[UserController::class, 'show']);
Route::delete('/user/{id}',[UserController::class, 'destroy']);
Route::post('/user',[UserController::class, 'store']);
Route::put('/user/{id}',[CarouselItemController::class, 'update']);



Route::get('/letter',[LetterController::class, 'index']);
Route::get('/letter/{id}',[LetterController::class, 'show']);
Route::delete('/letter/{id}',[LetterController::class, 'destroy']);
Route::post('/letter',[LetterController::class, 'store']);