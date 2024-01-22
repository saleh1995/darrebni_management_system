<?php

use App\Http\Controllers\AmountController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\SpecializetionController;
use App\Http\Controllers\BrunchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\EmployeeController;
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
// Auth Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('logout', [Authcontroller::class, 'logout']);
Route::resource('/course', CourseController::class);
Route::resource('/trainee', TraineeController::class);
Route::resource('/brunch', BrunchController::class);
Route::resource('/coach', CoachController::class);
Route::resource('/employee', EmployeeController::class);
Route::resource('/specializetion', SpecializetionController::class);

////brunch Routes
Route::prefix('brunch')->middleware('auth:sanctum')->group(function () {
    Route::post('/store', [BrunchController::class, 'store']);
    Route::get('/index', [BrunchController::class, 'index']);
    Route::get('/show/{id}', [BrunchController::class, 'show']);
    Route::delete('/delete/{id}', [BrunchController::class, 'delete']);
    Route::put('/update/{id}', [BrunchController::class, 'update']);
});
////employee Routes
Route::prefix('employee')->middleware('auth:sanctum')->group(function () {
    Route::post('/store', [EmployeeController::class, 'store']);
    Route::get('/index', [EmployeeController::class, 'index']);
    Route::get('/show/{id}', [EmployeeController::class, 'show']);
    Route::delete('/delete/{id}', [EmployeeController::class, 'delete']);
    Route::put('/update/{id}', [EmployeeController::class, 'update']);
});
////specializetion Routes
Route::prefix('specializetion')->middleware('auth:sanctum')->group(function(){
    Route::get('index', [SpecializetionController::class, 'index']);
    Route::get('show/{id}', [SpecializetionController::class, 'show']);
    Route::post('store', [SpecializetionController::class, 'store']);
    Route::put('update/{id}', [SpecializetionController::class, 'update']);
    Route::delete('delete/{id}', [SpecializetionController::class, 'delete']);
});
////coach Routes
Route::prefix('coach')->middleware('auth:sanctum')->group(function(){
    Route::get('index', [CoachController::class, 'index']);
    Route::get('show/{id}', [CoachController::class, 'show']);
    Route::post('store', [CoachController::class, 'store']);
    Route::put('update/{id}', [CoachController::class, 'update']);
    Route::delete('delete/{id}', [CoachController::class, 'delete']);
    Route::post('imageApi', [CoachController::class, 'imageApi']);
});


Route::prefix('amount')->group(function(){
    Route::get('index', [AmountController::class, 'index']);
    Route::get('show/{id}', [AmountController::class, 'show']);
    Route::post('store', [AmountController::class, 'store']);
    Route::put('update/{id}', [AmountController::class, 'update']);
    Route::delete('delete/{id}', [AmountController::class, 'delete']);
});
