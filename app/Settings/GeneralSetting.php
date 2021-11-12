<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{
    /**
     * Site Name
     *
     * @var string
     */
    public string $site_name;

    /**
     * Site Keywords
     *
     * @var string
     */
    public string $site_keywords;

    /**
     * Site Description
     *
     * @var string
     */
    public string $site_description;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'general';
    }
}
