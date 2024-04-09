<?php

namespace App\Filament\Resources\Ecommerce\ProductsResource\Pages;

use App\Filament\Resources\Ecommerce\ProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;
}
