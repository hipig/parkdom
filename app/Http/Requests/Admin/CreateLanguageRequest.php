<?php

namespace App\Http\Requests\Admin;


use App\Http\Requests\FormRequest;
use App\Rules\UploadLanguageRule;

class CreateLanguageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'language' => [
                'required',
                'mimes:json',
                new UploadLanguageRule(),
            ],
        ];
    }
}
