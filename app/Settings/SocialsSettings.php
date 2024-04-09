<?php

namespace App\Settings;

use Spatie\LaravelData\Data;

class SocialsSettings extends Data
{
    public function __construct(
        public ?array $links = [],

    ) {
    }
}
