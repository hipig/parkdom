<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;
use App\Settings\MailSetting;

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
            'captcha' => 'required',
            'is_notify' => [
                function ($attribute, $value, $fail) {
                    if ($value === 1) {
                        $mailSetting = app(MailSetting::class);
                        if (empty($mailSetting->username ?? $mailSetting->address )) {
                            $fail('Mail configuration is required. Please fill in it first.');
                        }
                    }
                }
            ],
            'notify_email' => 'required_if:is_notify,1',
        ];
    }
}
