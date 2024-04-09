<?php

namespace App\Filament\Resources\Forms\FormLeadResource\Pages;

use App\Filament\Resources\Forms\FormLeadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormLeads extends ListRecords
{
    protected static string $resource = FormLeadResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
