<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;

class DomainSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => 'required',
            'buy_links' => [
                function ($attribute, $value, $fail) {
                    $this->offsetSet($attribute, json_encode($value));
                }
            ]
        ];
    }
}
