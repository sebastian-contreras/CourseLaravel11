<?php

use App\Http\Controllers\Api\adressController;
use App\Http\Controllers\Api\courseController;
use App\Http\Controllers\Api\deviceController;
use App\Models\Course;
use App\Models\Device;
use App\Models\DeviceAccount;
use App\Models\Student;
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
Route::post('/students/{id}/courses', [studentController::class, 'modifyEnrollCourse']);




Route::get('/adresses/{id}', [adressController::class, 'getAdressStudent']);


Route::get('/devices',[deviceController::class,'getAllDevices']);
Route::get('/devices/{id}',[deviceController::class,'getDevice']);



Route::get('/courses',[courseController::class,'getAllCourses']);
Route::get('/courses/{id}',[courseController::class,'getCourse']);
Route::get('/addRelacion',function () {
    $student = Student::with(['courses'])->find(2);
    // $student->courses()->attach([1,2]);
    return $student;

});

//test hasOneThrought
Route::get('/hasonetest',function () {
    $student = Student::with('adress')->find(2);
    return $student->departamento;
});
//test hasManyThrought
Route::get('/hasmanytest',function () {
    $student = Student::with(['devices'])->find(2);
    // $devices = Device::with('accounts')->find(1);

return $student->accounts;

});
