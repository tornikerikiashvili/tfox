<?php

namespace App\Filament\Resources\Content\SliderResource\Pages;

use App\Filament\Resources\Content\SliderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliders extends ListRecords
{
    protected static string $resource = SliderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
