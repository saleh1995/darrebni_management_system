<?php

use App\Http\Controllers\BrunchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TraineeController;
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

// Bbrunch
Route::prefix('brunch')->group(function () {
    Route::post('/store', [BrunchController::class, 'store']);
    Route::get('/index', [BrunchController::class, 'index']);
    Route::get('/show/{id}', [BrunchController::class, 'show']);
    Route::post('/delete/{id}', [BrunchController::class, 'delete']);
    Route::post('/update/{id}', [BrunchController::class, 'update']);
});

// Auth Route
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('logout', [Authcontroller::class, 'logout']);

Route::resource('/course', CourseController::class);
Route::resource('/trainee', TraineeController::class);
