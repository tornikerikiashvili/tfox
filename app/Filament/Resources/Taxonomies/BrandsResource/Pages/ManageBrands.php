<?php

namespace App\Filament\Resources\Taxonomies\BrandsResource\Pages;

use App\Filament\Resources\Taxonomies\BrandsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageBrands extends ManageRecords
{
    protected static string $resource = BrandsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('type', static::$resource::$type);
    }
}
