<?php

namespace App\Filament\Resources\Taxonomies\BlogCategoryResource\Pages;

use App\Filament\Resources\Taxonomies\BlogCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListResources extends ListRecords
{
    protected static string $resource = BlogCategoryResource::class;

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
