<?php

use App\Settings\ContactsSettings;
use App\Settings\SocialsSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('communications.contacts', new ContactsSettings());
        $this->migrator->add('communications.socials', new SocialsSettings());
    }
};
