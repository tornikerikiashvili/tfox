<?php

namespace App\Filament\Resources\Taxonomies;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Palindroma\Core\Models\Tag;
use App\Models\Taxonomies\Brands;
use Filament\Forms\Components\Card;
use Palindroma\Core\Filament\Resource;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Palindroma\Core\Filament\Resources\TaxonomyResource;
use App\Filament\Resources\Taxonomies\BrandsResource\Pages;
use App\Filament\Resources\Taxonomies\BrandsResource\RelationManagers;
use Filament\Forms\Components\FileUpload;

class BrandsResource extends TaxonomyResource
{
    protected static ?string $model = Tag::class;

    protected static ?string $slug = 'taxonomies/brands';

    protected static ?string $navigationGroup = 'Products';

    protected static ?string $navigationLabel = 'Brands';

    protected static ?string $modelLabel = "Brands";

    protected static ?int $navigationSort = 2;

    public static ?string $type = 'product_brand_category';

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\Textarea::make('extra_attributes.title')
                ->label('Title')
                ->required(),
        ]);
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([
            Forms\Components\Hidden::make('type')->default(static::$type),
            FileUpload::make('metadata.logo')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBrands::route('/'),
        ];
    }
}
