<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use Illuminate\Http\Request;
use App\Models\Lesson;
use PhpParser\Node\Expr\AssignOp\Concat;

class LessonController extends Controller
{

    public function index()
    {
        $lessons = Lesson::all();
        return $this->handleResponse(new LessonResource($lessons), 'Lessons retrieved successfully.');
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return $this->handleError('Lesson not found.');
        }
        return $this->handleResponse(new LessonResource($lesson), 'Lesson retrieved successfully.');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string',
            'description'     => 'required|string',
            'start_date'     => 'required|date',
            'end_date'     => 'required|date',
            'teacher_id'     => 'required|integer',
            
            'student_id'     => 'required|integer',
            'classroom_id'     => 'required|integer',
           



        ]);
        $lesson = Lesson::create([
            'name'      => $attr['name'],
            'description'     => $attr['description'],
            'start_date'     => $attr['start_date'],
            'end_date'     => $attr['end_date'],
            'teacher_id'     => $attr['teacher_id'],




        ]);
       

     
        $lesson->students()->attach($attr['student_id']);

       

     
      
      
        
        return $this->handleResponse(new LessonResource($lesson), 'Lesson created successfully.');

        // $response = [
        //     'lesson'     => $lesson->only(['name','description','start_date','end_date']),

        // // ];
        // return response($response, 201);
    }
}
