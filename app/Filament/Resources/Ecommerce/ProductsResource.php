<?php

namespace App\Filament\Resources\Ecommerce;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Filament\SimpleResource;
use App\Models\Ecommerce\Product;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Palindroma\Core\Filament\Tables\MediaColumn;
use Palindroma\Core\Forms\Components\MediaPicker;
use Palindroma\Core\Filament\Resources\ContentResource;
use App\Filament\Resources\Ecommerce\ProductsResource\Pages;

class ProductsResource extends SimpleResource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'content/products';

    protected static ?string $navigationLabel = 'Products';

    protected static ?string $navigationGroup = 'Products';

    protected static ?string $recordTitleAttribute = 'title->main';

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
                    MediaPicker::make('cover_image')->label('Cover Image'),
                    MediaPicker::make('gallery')->label('gallery')->multiple(),
                ])->columnSpan(2),
            ]);
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\TextInput::make('name')->label('Product Name'),
            Fieldset::make('Title')
                    ->schema([
                        Forms\Components\TextInput::make('title.one')->label('Line One'),
                        Forms\Components\TextInput::make('title.two')->label('Line Two'),
                        Forms\Components\TextInput::make('title.three')->label('Line Three'),
                    ])->columns(3),
            RichEditor::make('content')

        ]);
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([
            Forms\Components\TextInput::make('metadata.slug'),
            Forms\Components\Checkbox::make('metadata.is_published')->label('Published'),
            Forms\Components\Select::make('category_id')
            ->relationship('category', 'title'),

            Forms\Components\Select::make('brand_id')
                ->relationship('brand', 'name', fn($query) => $query->where('type', 'product_brand_category'))
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\Hidden::make('type')->default('product_brand_category')->required(),
                ])
                ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                    return $action
                        ->modalHeading('Create Category')
                        ->modalButton('Create Category')
                        ->modalWidth('md');
                }),
            Forms\Components\DateTimePicker::make('published_at')->label('Published At'),
        ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                MediaColumn::make('cover_image')
                ->square()
                ->width(150)
                ->height(100),

                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')->label('Categories')
                ->relationship('category', 'title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ReplicateAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
