<?php

namespace App\Filament\Resources\Ecommerce\ProductsResource\Pages;

use App\Filament\Resources\Ecommerce\ProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
