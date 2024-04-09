<?php

namespace App\Settings;

use Spatie\LaravelData\Data;

class ContactsSettings extends Data
{
    public function __construct(
        public ?string $phone = null,
        public ?string $phone_2 = null,
        public ?string $address = null,
        public ?string $address_en = null,
        public ?string $address_ru = null,
        public ?string $email = null,
        public ?array $form = [],

    ) {
    }
}
