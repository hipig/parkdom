<?php

namespace App\Providers;

use App\Http\ViewComposers\DomainSettingComposer;
use App\Http\ViewComposers\GeneralSettingComposer;
use App\Http\ViewComposers\OfferSettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', GeneralSettingComposer::class);

        View::composer('domains.show', DomainSettingComposer::class);
        View::composer('domains.show', OfferSettingComposer::class);
    }
}
