<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ContactFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'key' => 'required',
            'value' => 'required'
        ];
    }
}
