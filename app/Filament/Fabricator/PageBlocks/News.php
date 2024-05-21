<?php

namespace App\Filament\Fabricator\PageBlocks;



use App\Models\Ecommerce\Product;
use App\Models\Content\TeamMember;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Builder\Block;
use Palindroma\Core\Filament\Fabricator\PageBlocks\ContentComponentBlock;

class News extends ContentComponentBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('news')
            ->label('News')
            ->schema([

                Section::make('Page Cover')->schema([

                        TextInput::make('page_cover_title')->label('Page Title'),

                    FileUpload::make('page_cover')->label('Cover Image'),
                ])->columns(1),

        ]);
    }
}
