<?php

namespace App\Filament\Resources\Content\PartnersResource\Pages;

use App\Filament\Resources\Content\PartnersResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartners extends EditRecord
{
    protected static string $resource = PartnersResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
