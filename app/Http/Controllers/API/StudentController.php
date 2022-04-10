<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all();
        return $this->handleResponse(new StudentResource($students), 'Students retrieved successfully.');
    }
    
    public function show($id)
    {
        $student = Student::find($id);
        if(!$student){
            return $this->handleError('Student not found.');
        }
        return $this->handleResponse(new StudentResource($student), 'Student retrieved successfully.');
    }
    
    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string',
            'email'     => 'required|email |unique:students',
            
           
        ]);
        $user = Student::create([
            'name'      => $attr['name'],
            'email'     => $attr['email'],
           
        ]);
       
        $response = [
            'student'     => $user->only(['name','email']),
           
        ];
        return response($response, 201);
    }
    
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if(!$student){
            return $this->handleError('Student not found.');
        }
        $student->update($request->all());
        return $this->handleResponse(new StudentResource($student), 'Student updated successfully.');
    }
    
    public function destroy($id)
    {
        $student = Student::find($id);
        if(!$student){
            return $this->handleError('Student not found.');
        }
        $student->delete();
        return $this->handleResponse(new StudentResource($student), 'Student deleted successfully.');
    }
}
