<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description'     => 'required|string',
            'start_date'     => 'required|date',
            'end_date'     => 'required|date',
            'teacher_id'     => 'required|integer',
            
            'student_id'     => 'required|integer',
            'classroom_id'     => 'required|integer',
           
        
        ];
    }
    public function meesages(){
        return [
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
            'start_date.required' => 'Start date is required',
            'end_date.required' => 'End date is required',
            'teacher_id.required' => 'Teacher id is required',
            'student_id.required' => 'Student id is required',
            'classroom_id.required' => 'Classroom id is required',
            
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
         
        ]);
    }
}
