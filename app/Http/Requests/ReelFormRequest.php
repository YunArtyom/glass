<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ReelFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'name' => 'required|string',
            'content' => 'required|string',
            'video' => 'required|string'
        ];
    }
}
