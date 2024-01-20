<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\SpecializetionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::prefix('specializetion')->group(function(){

    Route::get('index', [SpecializetionController::class, 'index']);
    Route::get('show/{id}', [SpecializetionController::class, 'show']);
    Route::post('store', [SpecializetionController::class, 'store']);
    Route::put('update/{id}', [SpecializetionController::class, 'update']);
    Route::delete('delete/{id}', [SpecializetionController::class, 'delete']);
});

Route::prefix('coach')->group(function(){
    Route::get('index', [CoachController::class, 'index']);
    Route::get('show/{id}', [CoachController::class, 'show']);
    Route::post('store', [CoachController::class, 'store']);
    Route::put('update/{id}', [CoachController::class, 'update']);
    Route::delete('delete/{id}', [CoachController::class, 'delete']);
    Route::post('imageApi', [CoachController::class, 'imageApi']);
});
