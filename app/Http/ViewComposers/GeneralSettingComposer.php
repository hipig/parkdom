<?php


namespace App\Http\ViewComposers;


use App\Settings\GeneralSetting;
use Illuminate\View\View;

class GeneralSettingComposer
{
    /**
     * The user repository implementation.
     *
     * @var GeneralSetting
     */
    protected $setting;

    /**
     * Create a new profile composer.
     *
     * @param  GeneralSetting  $setting
     * @return void
     */
    public function __construct(GeneralSetting $setting)
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
        $view->with('generalSetting', $this->setting);
    }
}
