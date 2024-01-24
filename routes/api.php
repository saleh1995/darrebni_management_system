<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\BrunchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TrainingBatchController;
use App\Http\Controllers\SpecializetionController;

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

// Auth Route
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [Authcontroller::class, 'logout']);
// Route::post('register', [AuthController::class, 'register']);
// user CRUD Resource
Route::middleware('auth:sanctum')->resource('/user', UserController::class);


//Global Group
Route::middleware('auth:sanctum')->group(function () {

    // Brunch
    Route::prefix('brunch')->group(function () {
        Route::post('/store', [BrunchController::class, 'store']);
        Route::get('/index', [BrunchController::class, 'index']);
        Route::get('/show/{id}', [BrunchController::class, 'show']);
        Route::delete('/delete/{id}', [BrunchController::class, 'delete']);
        Route::put('/update/{id}', [BrunchController::class, 'update']);
    });

    // employee
    Route::prefix('employee')->group(function () {
        Route::post('/store', [EmployeeController::class, 'store']);
        Route::get('/index', [EmployeeController::class, 'index']);
        Route::get('/show/{id}', [EmployeeController::class, 'show']);
        Route::delete('/delete/{id}', [EmployeeController::class, 'delete']);
        Route::put('/update/{id}', [EmployeeController::class, 'update']);
    });

    // specializetion Route
    Route::prefix('specializetion')->group(function () {
        Route::get('index', [SpecializetionController::class, 'index']);
        Route::get('show/{id}', [SpecializetionController::class, 'show']);
        Route::post('store', [SpecializetionController::class, 'store']);
        Route::put('update/{id}', [SpecializetionController::class, 'update']);
        Route::delete('delete/{id}', [SpecializetionController::class, 'delete']);
    });

    // coach Route
    Route::prefix('coach')->group(function () {
        Route::get('index', [CoachController::class, 'index']);
        Route::get('show/{id}', [CoachController::class, 'show']);
        Route::post('store', [CoachController::class, 'store']);
        Route::put('update/{id}', [CoachController::class, 'update']);
        Route::delete('delete/{id}', [CoachController::class, 'delete']);
        Route::post('imageApi', [CoachController::class, 'imageApi']);
    });


    ////amount routes
    Route::prefix('amount')->group(function () {
        Route::get('index', [AmountController::class, 'index']);
        Route::get('show/{id}', [AmountController::class, 'show']);
        Route::post('store', [AmountController::class, 'store']);
        Route::put('update/{id}', [AmountController::class, 'update']);
        Route::delete('delete/{id}', [AmountController::class, 'delete']);
    });

    ////Image routes
    Route::post('imageApi', [ImageController::class, 'imageApi']);

    ////
    Route::resource('/TrainingBatch', TrainingBatchController::class);
    Route::resource('/course', CourseController::class);
    Route::resource('/trainee', TraineeController::class);
});
