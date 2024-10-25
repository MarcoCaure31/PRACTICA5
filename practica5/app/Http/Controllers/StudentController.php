<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function show(){
        return Student::all();
    }

    public function edit(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'ru' => 'required|max:8',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Datos inválidos", "errors" => $validator->errors()], 400);
        }

        try {
            $student = Student::findOrFail($id);
            $student->ru = $request->ru;
            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->save();

            return response()->json(["message" => "Actualización exitosa"], 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Error al actualizar el registro", "error" => $e->getMessage()], 500);
        }
    }

    

    public function delete($id){
        Student::destroy($id);
        return response()->json(["message"=>"Eliminacion Existosa"]);                                
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'ru' => 'required|max:8',
            'firstName' => 'required',
            'lastName' => 'required',
        ]);      
        
        if ($validator->fails()) 
        {
            return response()->json(["message"=>"Error al crear Registro"]);                        
        }
        
        try
        {
            $student = new Student;
            $student->ru = $request->ru;
            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->save();
            return response()->json(["message"=>"Registro Exitoso"]);            
        }
        catch(Exception $e)
        {
            return response()->json(["message"=>"Erro al crear Registro"]);            
        }
    }    
}