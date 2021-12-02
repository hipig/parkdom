<?php


namespace App\Http\ViewComposers;


use App\Settings\OfferSetting;
use Illuminate\View\View;

class OfferSettingComposer
{
    /**
     * The user repository implementation.
     *
     * @var OfferSetting
     */
    protected $setting;

    /**
     * Create a new profile composer.
     *
     * @param  OfferSetting  $setting
     * @return void
     */
    public function __construct(OfferSetting $setting)
    {
        // Dependencies automatically resolved by service container...
        $this->setting = $setting;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('offerSetting', $this->setting);
    }
}
