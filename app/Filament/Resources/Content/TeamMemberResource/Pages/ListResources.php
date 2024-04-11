<?php

namespace App\Filament\Resources\Content\TeamMemberResource\Pages;

use App\Filament\Resources\Content\TeamMemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResources extends ListRecords
{
    protected static string $resource = TeamMemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
