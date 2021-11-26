<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateDomainSetting extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('domain.currency', 'USD');
        $this->migrator->add('domain.allow_offer', 1);
        $this->migrator->add('domain.min_price', '');
    }
}
