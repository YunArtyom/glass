<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EditPostFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'name' => 'required|string',
            'content' => 'required|string',
            'seo_name' => 'string|nullable',
            'seo_content' => 'string|nullable',
            'oldImages' => 'required_without:images',
            'images' => 'required_without:oldImages'
        ];
    }
}
