<?php

namespace App\Filament\Resources\Content\BlogTwoResource\Pages;

use App\Filament\Resources\Content\BlogTwoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogTwos extends ListRecords
{
    protected static string $resource = BlogTwoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
