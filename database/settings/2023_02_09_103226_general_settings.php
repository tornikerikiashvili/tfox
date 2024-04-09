<?php

use Palindroma\Core\Settings\SeoSettings;
use Palindroma\Core\Settings\SiteSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

class GeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.seo', new SeoSettings());
        $this->migrator->add('general.site', new SiteSettings());
    }
}
