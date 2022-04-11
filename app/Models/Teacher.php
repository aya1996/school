<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at'
    ];
 

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }

  

    
     

    
    
}
