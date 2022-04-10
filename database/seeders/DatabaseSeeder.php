<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Student::create(
            [
                'name' => ' aya mohamed',
                'email' => 'aya@gmail.com',
               
                'created_at' => now(),
                'updated_at' => now()
            ]
            
        );

        Teacher::create(
            [
                'name' => ' ahmed mohamed',
                'email' => 'ahmed@gmail.com',
               
                'created_at' => now(),
                'updated_at' => now()
            ]
            
        );

        Classroom::create(
            [
                'name' => ' class 1',
                'description' => ' class 1 description',
                'capacity' => '20',
                'status' => '1',
               
                'created_at' => now(),
                'updated_at' => now()
            ]
            
        );
    }
}
