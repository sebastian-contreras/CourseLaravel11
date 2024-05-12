<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    //
    public function getAllCourses(){
        $courses = Course::all();
        return $courses;        
    }
    public function getCourse($id){
        $course = Course::with('students')->find( $id );
        return $course;
    }
}
