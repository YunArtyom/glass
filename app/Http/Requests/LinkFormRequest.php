<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LinkFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'link' => 'required'
        ];
    }
}
