<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return $this->handleResponse(new TeacherResource($teachers), 'Teachers retrieved successfully.');
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return $this->handleError('Teacher not found.');
        }
        return $this->handleResponse(new TeacherResource($teacher), 'Teacher retrieved successfully.');
    }

    public function store(Request $request)
    {
        
        $attr = $request->validate([
            'name' => 'required|string',
            'email'     => 'required|email |unique:teachers',
            
           
        ]);
        $user = Teacher::create([
            'name'      => $attr['name'],
            'email'     => $attr['email'],
        
        ]);
       
        $response = [
            'teacher'     => $user->only(['name','email','created_at','updated_at']),
           
        ];
        return response($response, 201);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return $this->handleError('Teacher not found.');
        }
        $teacher->update($request->all());
        return $this->handleResponse(new TeacherResource($teacher), 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return $this->handleError('Teacher not found.');
        }
        $teacher->delete();
        return $this->handleResponse(new TeacherResource($teacher), 'Teacher deleted successfully.');
    }
}
