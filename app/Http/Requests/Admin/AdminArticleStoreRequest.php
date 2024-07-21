<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminArticleStoreRequest extends FormRequest
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
        $validator = [
            'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'min:10'],
            'content' => ['required'],
            'categories' => ['required'],
        ];

        if ($this->routeIs('admin.articles.create') && $this->isMethod('POST')) {
            $validator['images'] = ['required'];
        }

        return  $validator;
    }
}
