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
 //Public APIs
 Route::post('/login',  [AuthController::class,'login'])->name('user.login');
 Route::post('/user', [UserController::class,'store'])->name('user.store'); 
//Private APIs
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',  [AuthController::class,'logout']);

    Route::controller(CarouselItemController::class)->group(function () {
    Route::get('/carousel',         'index');
    Route::get('/carousel/{id}',    'show');
    Route::post('/carousel',        'store');
    Route::put('/carousel/{id}',    'update');
    Route::delete('/carousel/{id}', 'destroy');
        });

    Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/{id}', 'show');
    Route::delete('/user/{id}', 'destroy');
    Route::post('/user', 'store');  
    Route::put('/user/{id}', 'update');
            });
        
    Route::controller(LetterController::class)->group(function () {
    Route::get('/letter', 'index');
    Route::get('/letter/{id}', 'show');
    Route::delete('/letter/{id}' ,'destroy');
    Route::post('/letter', 'store');
                });       
});






