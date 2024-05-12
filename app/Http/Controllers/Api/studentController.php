<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class studentController extends Controller
{
    //
    public function index()
    {
        $student = Student::all();
        // if($student->isEmpty()){
        //     $data = [
        //         'message' => 'No hay estudiantes',
        //         'status'=> '200',
        //     ];
        //     return response()->json($data);
        // }
        $data = [
            'student' => $student,
            'status' => '200'
        ];

        return response()->json($data);
    }

    public function newStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:English,Spanish,French'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => '400'
            ];
            return response()->json($data, 400);
        }
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language,
        ]);
        if (!$student) {
            $data = [
                'message' => 'Error al crear el estudiante.',
                'status' => '500'
            ];
            return response()->json($data, 500);
        }
        return response()->json($student, 200);
    }

    public function getStudent(Request $request)
    {
        $student = Student::find($request->id);
        if (!$student) {
            return response()->json([
                'message' => 'No se encontro el estudiante',
                'status' => '200'
            ], 200);
        }
        $data = [
            'student' => $student,
            'status' => '200'
        ];
        return response()->json($data, 200);

    }
    public function deleteStudent($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'message' => 'No se encontro el estudiante',
                'status' => '404'
            ], 404);
        }
        $student->delete();
        $data = [
            'message' => 'El estudiante fue eliminado.',
            'status' => 200
        ];
        return response()->json($data, 200);

    }
    public function updateStudent($id, Request $request)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'message' => 'No se encontro el estudiante',
                'status' => '404'
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required|in:English,Spanish,French'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => '400'
            ];
            return response()->json($data, 400);
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->language = $request->language;
        $student->save();

        $data = [
            'message' => 'Estudiante actualizado',
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function updatePartialStudent($id, Request $request)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'message' => 'No se encontro el estudiante',
                'status' => '404'
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'email' => 'email|unique:student',
            'phone' => 'digits:10',
            'language' => 'in:English,Spanish,French'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => '400'
            ];
            return response()->json($data, 400);
        }
        if ($request->has('name')) {
            $student->name = $request->name;
        }
        if ($request->has('email')) {
            $student->email = $request->email;
        }
        if ($request->has('phone')) {
            $student->phone = $request->phone;
        }
        if ($request->has('language')) {
            $student->language = $request->language;
        }
        $student->save();

        $data = [
            'message' => 'Estudiante actualizado',
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

}
