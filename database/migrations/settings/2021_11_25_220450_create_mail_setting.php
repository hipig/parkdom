<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMailSetting extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.host', '');
        $this->migrator->add('mail.port', '');
        $this->migrator->add('mail.encryption', 'ssl');
        $this->migrator->add('mail.username', '');
        $this->migrator->add('mail.password', '');
        $this->migrator->add('mail.address', '');
        $this->migrator->add('mail.name', '');
    }


}
