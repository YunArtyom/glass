<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EditProductFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'name' => 'required|string',
            'price' => 'required|string',
            'desc' => 'required|string',
            'seo_name' => 'string|nullable',
            'seo_content' => 'string|nullable',
            'category_id' => 'required',
            'oldImg' => 'required_without:img',
            'img' => 'required_without:oldImg'
        ];
    }
}
