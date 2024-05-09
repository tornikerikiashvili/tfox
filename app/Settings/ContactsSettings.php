<?php

namespace App\Settings;

use Spatie\LaravelData\Data;

class ContactsSettings extends Data
{
    public function __construct(
        public ?string $phone = null,
        public ?string $address = null,
        public ?string $address_en = null,
        public ?string $direction_link = null,
        public ?string $email = null,
        public ?array $form = [],

    ) {
    }
}
