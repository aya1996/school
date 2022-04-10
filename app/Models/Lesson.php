<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'student_id',
        'teacher_id',
        'classroom_id',
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class , 'student_lesson'  , 'student_id','teacher_id','classroom_id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class , 'student_lesson' ,  'student_id','teacher_id','classroom_id');
    }

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class , 'student_lesson' , 'student_id','teacher_id','classroom_id');
    }

}
