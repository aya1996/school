<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = Classroom::all();
        return $this->handleResponse(new ClassroomResource($classroom), 'CLassroom have been retrieved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string',
            'description'     => 'required|string',
            'capacity'  => 'required|integer',
            'status'  => 'required|in:0,1',
           
        ]);
        $user = Classroom::create([
            'name'      => $attr['name'],
            'description'     => $attr['description'],
            'capacity'  => $attr['capacity'],
            'status'  => $attr['status'],
        ]);
       
        $response = [
            'classroom'     => $user->only(['name','descripttion','capacity','status']),
           
        ];
        return response($response, 201);
    }
 
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = Classroom::find($id);
        if (is_null($classroom)) {
            return $this->handleError('classroom not found!');
        }
        return $this->handleResponse(new ClassroomResource($classroom), 'Customer retrieved.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);
        if (is_null($classroom)) {
            return $this->handleError('classroom not found!');
        }
        $attr = $request->validate([
            'name' => 'required|string',
            'description'     => 'required|string',
            'capacity'  => 'required|integer',
            'status'  => 'required|in:0,1',
           
        ]);
        $classroom->update($attr);
        return $this->handleResponse(new ClassroomResource($classroom), 'classroom updated.');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $classroom = Classroom::find($id);
        if (is_null($classroom)) {
            return $this->handleError('classroom not found!');
        }
        $classroom->delete();
        return $this->handleResponse(null, 'classroom deleted.');
    }



}
