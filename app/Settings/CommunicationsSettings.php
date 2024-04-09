<?php

namespace App\Settings;

use Illuminate\Support\Arr;
use Spatie\LaravelSettings\Settings;

class CommunicationsSettings extends Settings
{

    public ?ContactsSettings $contacts = null;

    public ?SocialsSettings $socials = null;

    protected array $secretProperties = [
        'site.recaptcha.secret_key',
    ];

    public static function group(): string
    {
        return 'communications';
    }

    public function toArrayForFrontend(): array
    {
        return Arr::undot(Arr::dot($this->toArray()));
    }

}
