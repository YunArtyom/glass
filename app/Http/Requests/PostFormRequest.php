<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PostFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'name' => 'required|string',
            'content' => 'required|string',
            'seo_name' => 'string|nullable',
            'seo_content' => 'string|nullable',
            'images' => 'required|string'
        ];
    }
}
