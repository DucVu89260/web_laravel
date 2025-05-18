<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StudentStatusEnum;
use App\Models\Course;
use App\Models\Student;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],

            'gender' => [
                'required',
                'boolean',
            ],
            
            'birth_date' => [
                'required',
                'date',
                'before:today',
            ],

            'status' => [
                'required',
                Rule::in(StudentStatusEnum::asArray()),
            ],

            'course_id' => [
                'required',
                Rule::exists(Course::class, 'id'),
            ],

            'avatar' => [
                'nullable',
                'file',
                'image',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Student name is required',
            'name.string' => 'Student name must be a string',
            'name.min' => 'Student name must be at least 3 characters',
            'name.max' => 'Student name must not exceed 50 characters', 

            'course_id.required' => 'Course id is invalid',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Student Name',
        ];
    }
}
