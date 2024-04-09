<?php

namespace App\Filament\Fabricator\PageBlocks;

use Closure;
use Illuminate\Support\Str;
use App\Models\Content\News;
use App\Models\Content\Slider;
use Filament\Facades\Filament;
use App\Models\Content\Partner;
use App\Models\Content\Project;
use Palindroma\Core\Models\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use App\Models\Content\DynamicComponent;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Builder\Block;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use Palindroma\Core\Filament\Resources\ContentResource;
use Palindroma\Core\Filament\Fabricator\PageBlocks\ContentComponentBlock;

class HomePage extends ContentComponentBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('homepage')
            ->label('Homepage')
            ->schema([

                Section::make('Slider')->schema([
                    Select::make('slider')->label('Choose Slides')
                    ->options(fn() => Slider::all()->pluck('title.main', 'id'))
                    ->searchable()->multiple(),
                ])->columns(1),

                Section::make('About Block')
                    ->schema([
                        Fieldset::make('Title')
                    ->schema([
                        TextInput::make('about_title_one')->label('Title Line One'),
                        TextInput::make('about_title_two')->label('Title Line Two'),
                    ])->columns(2),

                        Textarea::make('about_content')->label('Content Left'),
                        Textarea::make('about_content_2')->label('Content Right')
                    ])->columns(1),

                Section::make('Projects')->schema([
                    TextInput::make('projects_title')->label('Block Title'),
                    TextInput::make('projects_teaser')->label('Block Teaser'),
                    Select::make('projects')->label('Choose Projects')
                    ->options(fn() => Project::all()->pluck('title.main', 'id'))
                    ->searchable()->multiple(),
                ])->columns(1),

                Section::make('Partners')->schema([
                    Fieldset::make('Title')
                    ->schema([
                        TextInput::make('partners_title_one')->label('Line One'),
                        TextInput::make('partners_title_two')->label('Line Two'),
                        TextInput::make('partners_title_three')->label('Line Three'),
                    ])->columns(3),
                    Select::make('partners')->label('Choose Partners')
                    ->options(fn() => Partner::all()->pluck('title', 'id'))
                    ->searchable()->multiple(),
                ])->columns(1),


                Section::make('News')->schema([
                    TextInput::make('news_title')->label('Block Title'),
                    TextInput::make('news_teaser')->label('Block Title'),
                    Select::make('news')->label('Choose News')
                    ->options(fn() => News::all()->pluck('title.main', 'id'))
                    ->searchable()->multiple(),
                ])->columns(1),


                Section::make('Video')->schema([
                    TextInput::make('video_link')->label('video Link'),
                    FileUpload::make('video_cover')->label('Cover Image'),
                ])->columns(1),




                // TextInput::make('teaser')->label('Teaser')
                // ->visible(fn(Closure $get) => in_array($get('component'), [
                //     'popularCategories',

                // ])),

                // Grid::make()->schema([
                //     TextInput::make('cta.title')->label('Cta Title'),
                //     TextInput::make('cta.link')->label('Cta Link'),
                // ])->visible(fn(Closure $get) => in_array($get('component'), [
                //     'steps',
                // ])),

                // Select::make('view_all')
                //     ->options(fn() => Page::all()->pluck('title', 'slug'))
                //     ->searchable()
                //    ->visible(fn(Closure $get) => in_array($get('component'), [
                //                 'currentAuctions',
                //                 'recentAnnouncements',
                //                 'latestBlogs'
                //             ])),

                // Select::make('config')
                //     ->options([
                //         'textCenter' => 'TextCenter',
                //     ])->visible(fn(Closure $get) => $get('component') === 'video')->searchable(),

                // Select::make('config')
                //     ->options([
                //         'greyBg' => 'GreyBg',
                //     ])->visible(fn(Closure $get) => $get('component') === 'testimonials')->searchable(),

        ]);
    }
}
