<?php


namespace App\Http\ViewComposers;


use App\Settings\DomainSetting;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DomainSettingComposer
{
    /**
     * The user repository implementation.
     *
     * @var DomainSetting
     */
    protected $setting;

    /**
     * Create a new profile composer.
     *
     * @param  DomainSetting  $setting
     * @return void
     */
    public function __construct(DomainSetting $setting)
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
        $view->with('domainSetting', $this->setting);
    }
}
