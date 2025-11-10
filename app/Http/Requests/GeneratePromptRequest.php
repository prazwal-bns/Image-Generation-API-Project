<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneratePromptRequest extends FormRequest
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
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,svg', 'max:10240', 'dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000','min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'The image is required.',
            'image.file' => 'The image must be a file.',
            'image.image' => 'The image must be an image.',
            'image.mimes' => 'The image must be a JPEG, PNG, JPG, or SVG file.',
            'image.max' => 'The image must be less than 10MB.',
            'image.dimensions' => 'The image must be between 100x100 and 10000x10000 pixels.',
        ];
    }
}
