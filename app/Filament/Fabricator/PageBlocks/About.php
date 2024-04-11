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

class About extends ContentComponentBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('about')
            ->label('About')
            ->schema([

                Section::make('Page Cover')->schema([
                    Fieldset::make('Title')->schema([
                        TextInput::make('page_cover_title_one')->label('Line One'),
                        TextInput::make('page_cover_title_two')->label('Line Two'),
                    ])->columns(2),
                    FileUpload::make('page_cover')->label('Cover Image'),
                ])->columns(1),

                Section::make('content')->schema([
                    Fieldset::make('Mission')->schema([
                        TextInput::make('about_mission_title')->label('Mission Title'),
                        Textarea::make('about_mission_text')->label('Mission Text'),
                    ])->columns(1),

                    Fieldset::make('Goal')->schema([
                        TextInput::make('about_goal_title')->label('Goal Title'),
                        Textarea::make('about_goal_text')->label('Goal Text'),
                    ])->columns(1),

                    Fieldset::make('Values')->schema([
                        TextInput::make('about_values_title')->label('Values Title'),
                        Textarea::make('about_values_text')->label('Values Text'),
                    ])->columns(1),
                ])->columns(1),

                Section::make('Team')->schema([
                    Fieldset::make('Title')
                    ->schema([
                        TextInput::make('team_title_one')->label('Line One'),
                        TextInput::make('team_title_two')->label('Line Two'),
                        TextInput::make('team_title_three')->label('Line Three'),
                    ])->columns(3),
                    TextInput::make('team_subtitle')->label('Subtitle'),
                    Select::make('team')->label('Choose Team Member')
                    ->options(fn() => TeamMember::all()->pluck('title', 'id'))
                    ->searchable()->multiple(),
                ])->columns(1),



                Section::make('About Company')->schema([
                        TextInput::make('about_title')->label('About Title'),
                        Textarea::make('about_text')->label('About Text'),
                ])->columns(1),



        ]);
    }
}
