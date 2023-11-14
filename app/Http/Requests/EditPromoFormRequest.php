<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EditPromoFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string',
            'name' => 'required|string',
            'content' => 'required|string',
            'oldImg' => 'required_without:img',
            'img' => 'required_without:oldImg',
            'end_date' => 'required'
        ];
    }
}
