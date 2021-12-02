<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\FormRequest;
use App\Settings\OfferSetting;
use Illuminate\Validation\Rule;

class OfferRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $domain = $this->route()->parameter('domain');
        return [
            'name' => 'required',
            'email' => 'required|email',
            'offer_price' => 'required|numeric|min:' . ($domain->min_price ?? 0),
            'captcha_code' => app(OfferSetting::class)->enableMewsCaptcha() ? 'required|captcha' : '',
        ];
    }
}
