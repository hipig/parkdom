<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;

class MailSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'host' => 'required',
            'port' => 'required',
            'encryption' => 'required',
            'username' => 'required',
            'password' => 'required',
            'address' => 'required',
            'name' => 'required',
        ];
    }
}
