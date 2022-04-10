<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return $this->handleResponse($teachers, 'Teachers retrieved successfully.');
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return $this->handleError('Teacher not found.');
        }
        return $this->handleResponse($teacher, 'Teacher retrieved successfully.');
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());
        return $this->handleResponse($teacher, 'Teacher created successfully.');
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return $this->handleError('Teacher not found.');
        }
        $teacher->update($request->all());
        return $this->handleResponse($teacher, 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return $this->handleError('Teacher not found.');
        }
        $teacher->delete();
        return $this->handleResponse($teacher, 'Teacher deleted successfully.');
    }
}
