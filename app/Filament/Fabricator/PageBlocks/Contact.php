<?php

namespace App\Filament\Fabricator\PageBlocks;



use App\Models\Content\Partner;
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

class Contact extends ContentComponentBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('contact')
            ->label('Contact')
            ->schema([

                Section::make('Page Cover')->schema([
                    Fieldset::make('Title')->schema([
                        TextInput::make('page_cover_title_one')->label('Line One'),
                        TextInput::make('page_cover_title_two')->label('Line Two'),
                    ])->columns(2),
                    FileUpload::make('page_cover')->label('Cover Image'),
                ])->columns(1),

                Section::make('content')->schema([
                    Fieldset::make('Contact Info')->schema([
                        TextInput::make('contact_phone')->label('Phone'),
                        TextInput::make('contact_email')->label('Email'),
                        TextInput::make('contact_address')->label('Address'),
                    ])->columns(1),

                    Fieldset::make('Google Map')->schema([
                        Textarea::make('contact_map_code')->label('Contact Map Code'),
                    ])->columns(1),

                ])->columns(1),

                Section::make('Contact Form BAckground')->schema([
                    FileUpload::make('contact_form_bg')->label('Bg image'),
                ])->columns(1),

                // Section::make('Clients')->schema([
                //     Fieldset::make('Title')
                //     ->schema([
                //         TextInput::make('partners_title_one')->label('Line One'),
                //         TextInput::make('partners_title_two')->label('Line Two'),
                //         TextInput::make('partners_title_three')->label('Line Three'),
                //     ])->columns(3),
                //     Select::make('clients')->label('Choose Partners')
                //     ->options(fn() => Partner::all()->pluck('title', 'id'))
                //     ->searchable()->multiple(),
                // ])->columns(1),



                // Section::make('About Company')->schema([
                //         TextInput::make('about_title')->label('About Title'),
                //         Textarea::make('about_text')->label('About Text'),
                // ])->columns(1),



        ]);
    }
}
