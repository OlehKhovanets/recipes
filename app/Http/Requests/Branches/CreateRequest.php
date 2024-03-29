<?php

namespace App\Http\Requests\Branches;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'calories_per_gram' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:10000',
        ];
    }
}
