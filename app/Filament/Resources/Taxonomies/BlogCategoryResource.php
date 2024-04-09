<?php

namespace App\Filament\Resources\Taxonomies;

use App\Filament\Resources\Taxonomies\BlogCategoryResource\Pages\ListResources;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Table;
use Filament\Tables;
use Palindroma\Core\Filament\Resources\TaxonomyResource;
use Palindroma\Core\Models\Tag;

class BlogCategoryResource extends TaxonomyResource
{
    protected static ?string $model = Tag::class;

    protected static ?string $slug = 'taxonomies/news-categories';

    protected static ?string $navigationGroup = 'News & Media';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?string $modelLabel = "News Category";

    protected static ?int $navigationSort = 2;

    public static ?string $type = 'blog_category';

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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListResources::route('/'),
        ];
    }
}
