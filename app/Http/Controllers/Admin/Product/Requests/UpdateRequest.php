<?php

namespace App\Http\Controllers\Admin\Product\Requests;

use App\Http\Requests\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->product->id,
        ];
    }
}
