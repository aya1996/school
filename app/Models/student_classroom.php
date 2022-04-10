<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'classroom_id',
        'created_at',
        'updated_at'
    ];
     
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
