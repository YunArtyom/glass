<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PromoFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'img' => 'required',
            'content' => 'required|string'
        ];
    }
}
