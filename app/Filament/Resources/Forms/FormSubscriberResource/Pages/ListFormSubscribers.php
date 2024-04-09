<?php

namespace App\Filament\Resources\Forms\FormSubscriberResource\Pages;

use App\Filament\Resources\Forms\FormSubscriberResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormSubscribers extends ListRecords
{
    protected static string $resource = FormSubscriberResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
