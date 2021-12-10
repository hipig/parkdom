<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{

    /**
     * Site Name
     *
     */
    public $site_name;

    /**
     * Site Keywords
     *
     */
    public $site_keywords;

    /**
     * Site Description
     *
     */
    public $site_description;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'general';
    }

    public function getTranslation($key)
    {
        return is_array($this->{$key}) ? ($this->{$key}[$this->getLocale()] ?? '') : $this->{$key};
    }

    public function getLocale()
    {
        return config('app.locale');
    }
}
