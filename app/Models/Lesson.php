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
        'start_date',
        'end_date',
        'teacher_id',
        'student_id',
        'classroom_id',
        'created_at',
        'updated_at'
    ];
  
    public function students()
    {
        return $this->belongsToMany(Student::class ,'student_lesson' ,'student_id' , 'classroom_id');
    }

   

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

  

    
         
  
    

}
