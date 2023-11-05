<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoryFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'title' => 'required|string|unique:categories,title'
        ];
    }
}
