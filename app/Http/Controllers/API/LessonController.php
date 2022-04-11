<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use Illuminate\Http\Request;
use App\Models\Lesson;
use PhpParser\Node\Expr\AssignOp\Concat;
use App\Http\Requests\LessonRequest;

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

    public function store(LessonRequest $request)
    {
    
        $lesson = Lesson::create([
            'name'      => $request['name'],
            'description'     => $request['description'],
            'start_date'     => $request['start_date'],
            'end_date'     => $request['end_date'],
            'teacher_id'     => $request['teacher_id'],




        ]);
       

     
        $lesson->students()->attach($request['student_id']);

       

     
      
      
        
        return $this->handleResponse(new LessonResource($lesson), 'Lesson created successfully.');

        // $response = [
        //     'lesson'     => $lesson->only(['name','description','start_date','end_date']),

        // // ];
        // return response($response, 201);
    }
}
