<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;

class OfferSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'notify_email' => 'required_if:is_notify,1',
        ];
    }
}
