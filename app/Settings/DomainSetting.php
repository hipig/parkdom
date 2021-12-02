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
     * Buy Links
     * @var
     */
    public $buy_links;

    /**
     * Setting Group
     *
     * @return string
     */
    public static function group(): string
    {
        return  'domain';
    }

    public function getBuyLinks()
    {
        $links = json_decode($this->buy_links, true) ?? [];
        foreach ($links as $key => $link) {
            $label = explode('|', $link['label']);
            if (count($label) > 1) {
                $links[$key]['label_prefix'] = $label[0];
                $links[$key]['label'] = $label[1];
            }
        }
        return $links;
    }
}
