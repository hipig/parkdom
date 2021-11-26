<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class ContactSetting extends Settings
{
    /**
     * Contact Phone
     *
     */
    public $phone;

    /**
     * Contact Email
     *
     */
    public $email;

    /**
     * Contact Facebook Link
     *
     */
    public $facebook;

    /**
     * Contact Twitter Link
     *
     */
    public $twitter;

    /**
     * Contact Vk
     *
     */
    public $vk;

    /**
     * Contact Skype
     *
     */
    public $skype;

    /**
     * Contact Whatsapp
     *
     */
    public $whatsapp;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'contact';
    }
}
