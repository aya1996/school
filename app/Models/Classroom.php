<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'status',
        'created_at',
        'updated_at'
    ];
  
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }   
  

    

}
