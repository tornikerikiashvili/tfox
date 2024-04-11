<?php

namespace App\Filament\Resources\Content\TeamMemberResource\Pages;

use App\Filament\Resources\Content\TeamMemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResource extends EditRecord
{
    protected static string $resource = TeamMemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
