<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:10',
        ];
    }

    public function messages(): array //Optional is want to set custom error message
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'Min 3 words required',
            'description.required' => 'A message is required',
        ];
    }
}
