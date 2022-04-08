<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'body' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
