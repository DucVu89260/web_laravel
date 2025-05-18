<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                'unique:App\Models\Course,name,',
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
            'name.unique' => 'Course name was already taken',
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
