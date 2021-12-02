<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class OfferSetting extends Settings
{
    /**
     * Enable Captcha
     *
     */
    public $captcha;

    /**
     * Enable Notify
     *
     */
    public $is_notify;

    /**
     * Notify Email
     *
     */
    public $notify_email;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'offer';
    }

    public function enableMewsCaptcha()
    {
        return $this->captcha === 'mews/captcha';
    }
}
