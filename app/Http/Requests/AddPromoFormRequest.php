<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AddPromoFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'content' => 'required|string',
            'img' => 'required',
            'end_date' => 'required'
        ];
    }
}
