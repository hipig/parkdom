<?php

namespace App\Http\Requests;

use App\Rules\ValidateUserPasswordRule;

class UpdateSecurityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => [
                'required',
                'string',
                'min:6',
                new ValidateUserPasswordRule()
            ],
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
