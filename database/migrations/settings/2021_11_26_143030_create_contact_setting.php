<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateContactSetting extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact.phone', '');
        $this->migrator->add('contact.email', '');
        $this->migrator->add('contact.facebook', '');
        $this->migrator->add('contact.twitter', '');
        $this->migrator->add('contact.vk', '');
        $this->migrator->add('contact.skype', '');
        $this->migrator->add('contact.whatsapp', '');
    }
}
