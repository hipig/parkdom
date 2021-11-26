<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSetting extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', config('app.name'));
        $this->migrator->add('general.site_keywords', 'This is the site keywords');
        $this->migrator->add('general.site_description', 'This is the site description');
    }
}
