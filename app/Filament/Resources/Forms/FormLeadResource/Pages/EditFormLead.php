<?php

namespace App\Filament\Resources\Forms\FormLeadResource\Pages;

use App\Filament\Resources\Forms\FormLeadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormLead extends EditRecord
{
    protected static string $resource = FormLeadResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
