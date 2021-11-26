<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateOfferSetting extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('offer.captcha', 'disable');
        $this->migrator->add('offer.is_notify', 2);
        $this->migrator->add('offer.notify_email', '');
    }
}
