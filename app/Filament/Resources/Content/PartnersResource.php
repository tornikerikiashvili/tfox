<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Content\Partner;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Radio;
use Palindroma\Core\Filament\Resource;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Palindroma\Core\Filament\Tables\MediaColumn;
use Palindroma\Core\Forms\Components\MediaPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Palindroma\Core\Filament\Resources\ContentResource;
use App\Filament\Resources\Content\PartnersResource\Pages;
use App\Filament\Resources\Content\PartnersResource\RelationManagers;
use App\Filament\SimpleResource;

class PartnersResource extends SimpleResource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    protected static ?string $navigationLabel = 'Clients & Partners';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $slug = 'content/partners';

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

            ]);
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\TextInput::make('title'),
            Forms\Components\TextInput::make('link'),
            MediaPicker::make('image.main')->label('Main Logo'),
            MediaPicker::make('image.hover')->label('Hover Logo'),


        ]);
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->reorderable('order_column')
            ->columns([
                MediaColumn::make('image.main')->square()->width(150)->height(100),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartners::route('/create'),
            'edit' => Pages\EditPartners::route('/{record}/edit'),
        ];
    }
}
