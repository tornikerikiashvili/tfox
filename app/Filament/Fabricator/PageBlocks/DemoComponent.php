<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Palindroma\Core\Filament\Fabricator\PageBlocks\PageBlock;
use Palindroma\Core\Forms\Components\MediaPicker;

class DemoComponent extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('demo-component')
            ->label('Demo Component')
            ->schema([
                Forms\Components\TextInput::make('title'),

                MediaPicker::make('gallery'),

            ]);
    }
}
