<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all();
        return $this->handleResponse($students, 'Students retrieved successfully.');
    }
    
    public function show($id)
    {
        $student = Student::find($id);
        if(!$student){
            return $this->handleError('Student not found.');
        }
        return $this->handleResponse($student, 'Student retrieved successfully.');
    }
    
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return $this->handleResponse($student, 'Student created successfully.');
    }
    
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if(!$student){
            return $this->handleError('Student not found.');
        }
        $student->update($request->all());
        return $this->handleResponse($student, 'Student updated successfully.');
    }
    
    public function destroy($id)
    {
        $student = Student::find($id);
        if(!$student){
            return $this->handleError('Student not found.');
        }
        $student->delete();
        return $this->handleResponse($student, 'Student deleted successfully.');
    }
}
