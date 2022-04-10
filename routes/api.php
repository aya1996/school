<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TeacherController;
use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\LessonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/////students routes////
Route::get('/students',[StudentController::class, 'index']);
Route::get('/student/{id}',[StudentController ::class, 'show']);
Route::post('/student',[StudentController::class, 'store']);
Route::put('/student/{id}',[StudentController::class, 'update']);
Route::delete('/student/{id}',[StudentController::class, 'destroy']);

/////teachers routes////
Route::get('/teachers',[TeacherController::class, 'index']);
Route::get('/teacher/{id}',[TeacherController ::class, 'show']);
Route::post('/teacher',[TeacherController::class, 'store']);
Route::put('/teacher/{id}',[TeacherController::class, 'update']);
Route::delete('/teacher/{id}',[TeacherController::class, 'destroy']);

/////classrooms routes////
Route::get('/classrooms',[ClassroomController::class, 'index']);
Route::get('/classroom/{id}',[ClassroomController ::class, 'show']);
Route::post('/classroom',[ClassroomController::class, 'store']);
Route::put('/classroom/{id}',[ClassroomController::class, 'update']);
Route::delete('/classroom/{id}',[ClassroomController::class, 'destroy']);

//lessons routes//
Route::get('/lessons',[LessonController::class, 'index']);
Route::get('/lesson/{id}',[LessonController ::class, 'show']);
Route::post('/lesson',[LessonController::class, 'store']);
Route::put('/lesson/{id}',[LessonController::class, 'update']);
Route::delete('/lesson/{id}',[LessonController::class, 'destroy']);

 

  