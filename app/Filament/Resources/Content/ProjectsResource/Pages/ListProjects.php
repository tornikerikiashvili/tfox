<?php

namespace App\Filament\Resources\Content\ProjectsResource\Pages;

use App\Filament\Resources\Content\ProjectsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
