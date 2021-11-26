<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class MailSetting extends Settings
{
    /**
     * Mail Host
     *
     */
    public $host;

    /**
     * Mail Port
     *
     */
    public $port;

    /**
     * Mail Encryption
     *
     */
    public $encryption;

    /**
     * Mail Username
     *
     */
    public $username;

    /**
     * Mail Password
     *
     */
    public $password;

    /**
     * Mail Fromm Address
     *
     */
    public $address;

    /**
     * Mail Fromm Name
     *
     */
    public $name;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'mail';
    }
}
