<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class DomainSetting extends Settings
{
    /**
     * Price Currency
     *
     */
    public $currency;

    /**
     * Allow Offer
     *
     */
    public $allow_offer;

    /**
     * Min Offer Price
     *
     */
    public $min_price;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'domain';
    }
}
