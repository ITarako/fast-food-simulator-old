<?php

namespace App\Http\Controllers\Admin\Category\Requests;

use App\Http\Requests\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->category->id,
        ];
    }
}
