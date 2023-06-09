<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => ['required', 'min:5'],
            'text' => ['required', 'min:5', 'max:65000'],
            'image' => ['max:2048', 'mimes:jpg,png,jpeg'],
            'category' => ['required','integer']
        ];
    }

    public function messages(): array
    {
        return [
            'category.integer' => 'Please provide a category!'
        ];
    }
}
