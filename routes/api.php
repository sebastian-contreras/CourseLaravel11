<?php

use App\Http\Controllers\Api\adressController;
use App\Http\Controllers\Api\deviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\studentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/students', [studentController::class, 'index']);
Route::get('/students/{id}', [studentController::class, 'getStudent']);
Route::post('/students', [studentController::class, 'newStudent']);
Route::put('/students/{id}', [studentController::class, 'updateStudent']);
Route::patch('/students/{id}', [studentController::class, 'updatePartialStudent']);
Route::delete('/students/{id}', [studentController::class, 'deleteStudent']);




Route::get('/adresses/{id}', [adressController::class, 'getAdressStudent']);


Route::get('/devices',[deviceController::class,'getAllDevices']);
Route::get('/devices/{id}',[deviceController::class,'getDevice']);