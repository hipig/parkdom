<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;
use Illuminate\Support\Str;

class BatchCreateDomainRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'domains' => [
                'required',
                function ($attribute, $value, $fail) {
                    $domains = preg_split('/\r\n/', $value);
                    $uniqueDomains = array_unique(array_filter($domains));

                    foreach ($uniqueDomains as $domain) {
                        if (count(explode('.', $domain)) < 2) {
                            $fail($attribute . ' is invalid.');
                        }
                    }

                    $this->offsetSet('domains', $uniqueDomains);
                },
            ],
            'estimated_price' => 'required',
            'currency' => 'required'
        ];
    }
}
