<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => 'required',
            'site_keywords' => 'required',
            'site_description' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'site_name' => '网站标题',
            'site_keywords' => '网站关键词',
            'site_description' => '网站描述',
        ];
    }
}
