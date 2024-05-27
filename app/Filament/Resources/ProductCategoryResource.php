<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ProductCategory;
use Palindroma\Core\Models\Tag;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Palindroma\Core\Filament\Resource;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Palindroma\Core\Filament\Tables\MediaColumn;
use Palindroma\Core\Forms\Components\MediaPicker;
use Palindroma\Core\Filament\Resources\ContentResource;
use App\Filament\Resources\ProductCategoryResource\Pages;

class ProductCategoryResource extends ContentResource
{
    protected static ?string $model = ProductCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $slug = 'content/product-categories';

    protected static ?string $navigationLabel = 'Product Categories';

    protected static ?string $navigationGroup = 'Products';

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
                  MediaPicker::make('metadata.cover_image')->label('Cover Image'),

              ])->columnSpan(2),
          ]);
  }



    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            TextInput::make('title'),
            Fieldset::make('Slide Title')
            ->schema([
                Forms\Components\TextInput::make('slide_title.one')->label('Line One'),
                Forms\Components\TextInput::make('slide_title.two')->label('Line Two'),
                Forms\Components\TextInput::make('slide_title.three')->label('Line Three'),
            ])->columns(3),
        ]);
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([
            Select::make('metadata.brands')->label('Choose Brands')
            ->options(fn() => Tag::where('type', 'product_brand_category')->pluck('name', 'id'))
            ->searchable()->multiple(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                MediaColumn::make('metadata.cover_image')
                ->square()
                ->width(150)
                ->height(100),
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
