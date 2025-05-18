<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
                'max:255',
                Rule::unique(Course::class)->ignore($this->course),
                // 'unique:courses,name',
                'min:3',
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Course name is required',
            'name.string' => 'Course name must be a string',
            'name.max' => 'Course name must not exceed 255 characters',
            'name.min' => 'Course name must be at least 3 characters',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Course Name',
        ];
    }
}

