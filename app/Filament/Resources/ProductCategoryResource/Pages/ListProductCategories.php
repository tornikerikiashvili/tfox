<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use App\Filament\Widgets\ProductCategoryWidget;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductCategories extends ListRecords
{
    protected static string $resource = ProductCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ProductCategoryWidget::class
        ];
    }

    public static function getPages(): array
{
    return [
        // ...
        'tree-list' => ProductCategoryTree::route('/tree-list'),
    ];
}


}
