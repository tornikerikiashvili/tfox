<?php

namespace App\Filament\Resources\Forms\FormFeedbackResource\Pages;

use App\Filament\Resources\Forms\FormFeedbackResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormFeedbacks extends ListRecords
{
    protected static string $resource = FormFeedbackResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
