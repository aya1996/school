<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'classroom_id',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }



    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
    
}
