<?php

namespace App\Filament\Resources\Content\ProjectsResource\Pages;

use App\Filament\Resources\Content\ProjectsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjects extends EditRecord
{
    protected static string $resource = ProjectsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
