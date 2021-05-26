<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;

class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function getFormData(): array
    {
        $data = $this->request->all();

        $data = Arr::except($data, [
            '_token',
            '_method'
        ]);

        return $data;
    }
}
