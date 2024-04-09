<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Content\Slider;
use App\Filament\SimpleResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Palindroma\Core\Filament\Tables\MediaColumn;
use Palindroma\Core\Forms\Components\MediaPicker;
use App\Filament\Resources\Content\SliderResource\Pages;

class SliderResource extends SimpleResource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationLabel = 'Slider';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form->columns(3)->schema(
            [
                Forms\Components\Group::make()
                    ->statePath('resourceTranslations')
                    ->schema([
                        Tabs::make('Translations')->schema(
                            collect(config('palindroma.supported_locales'))
                                ->map(fn($locale) => static::getTranslatableFields($locale))
                                ->toArray()
                        ),
                    ])
                    ->columnSpan(2),
                Forms\Components\Group::make()->schema([
                        static::getMetaFields(),
                    ]
                )->columnSpan(1),
                Forms\Components\Section::make('Media')->schema([
                    Forms\Components\Grid::make(2)->schema([
                        MediaPicker::make('images.desk')->label('Image Desktop'),
                        MediaPicker::make('images.mob')->label('Image Mobile'),
                    ]),
                ])->columnSpan(2),
            ]);
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\TextInput::make('title.main')->label('Slide Name'),
            Fieldset::make('Title')
                    ->schema([
                        Forms\Components\TextInput::make('title.one')->label('Line One'),
            Forms\Components\TextInput::make('title.two')->label('Line Two'),
            Forms\Components\TextInput::make('title.three')->label('Line Three'),
                    ])->columns(3),

            Forms\Components\TextInput::make('teaser'),
            Forms\Components\Grid::make()->schema([
                Forms\Components\TextInput::make('cta_button.title')->label('CTA Button Title'),
                Forms\Components\TextInput::make('cta_button.link')->label('CTA Button Link'),
            ]),


        ]);
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([
            Toggle::make('metadata.red')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                MediaColumn::make('images.desk')->label('Image Desktop')->square()->width(150)->height(100),
                MediaColumn::make('images.mob')->label('Image Mobile')->square()->width(150)->height(100),
                Tables\Columns\TextColumn::make('title'),
            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);

    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
