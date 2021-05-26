<?php

namespace App\Http\Controllers\Admin\Category\Requests;

use App\Http\Requests\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name',
        ];
    }
}
