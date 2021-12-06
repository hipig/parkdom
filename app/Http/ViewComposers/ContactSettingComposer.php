<?php


namespace App\Http\ViewComposers;


use App\Settings\ContactSetting;
use Illuminate\View\View;

class ContactSettingComposer
{
    /**
     * The user repository implementation.
     *
     * @var ContactSetting
     */
    protected $setting;

    /**
     * Create a new profile composer.
     *
     * @param  ContactSetting  $setting
     * @return void
     */
    public function __construct(ContactSetting $setting)
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
        $view->with('contactSetting', $this->setting);
    }
}
