<?php

namespace App\Filament\Resources\Content\BlogResource\Pages;

use App\Filament\Resources\Content\BlogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
