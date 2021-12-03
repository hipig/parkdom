<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => lang('domain.contact_name'),
            'email' => lang('domain.contact_email'),
            'content' => lang('domain.contact_content'),
        ];
    }
}
