<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;

class DomainRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'domain' => 'required',
            'estimated_price' => 'required',
        ];
    }
}
