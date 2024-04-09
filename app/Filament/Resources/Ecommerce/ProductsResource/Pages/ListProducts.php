<?php

namespace App\Filament\Resources\Ecommerce\ProductsResource\Pages;

use App\Filament\Resources\Ecommerce\ProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
