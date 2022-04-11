<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at'
    ];
 
    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
   
}
