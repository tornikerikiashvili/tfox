<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Content\BlogTwo;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use FilamentTiptapEditor\TiptapEditor;
use Palindroma\Core\Filament\Resource;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Palindroma\Core\Forms\Components\SEOForm;
use Palindroma\Core\Forms\Components\MediaPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Palindroma\Core\Filament\Resources\ContentResource;
use App\Filament\Resources\Content\BlogTwoResource\Pages;
use App\Filament\Resources\Content\BlogTwoResource\RelationManagers;

class BlogTwoResource extends ContentResource
{
    protected static ?string $model = BlogTwo::class;

    protected static ?string $slug = 'content/blog';

    protected static ?string $navigationLabel = 'Blog';

    protected static ?string $navigationGroup = 'News & Media';

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
                    Forms\Components\Grid::make()->schema([
                        MediaPicker::make('inner_cover_image')->label('gallery')->multiple(),
                        ])
                ])->columnSpan(2),
            ]);
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\TextInput::make('title')->label('Project Name'),
            Forms\Components\Textarea::make('teaser'),
            TiptapEditor::make('content'),
            FileUpload::make('cover_image')->label('Cover Image')->image(),
            Forms\Components\Section::make('SEO Settings')->schema([
                SEOForm::make('seo_settings'),
            ])
        ]);
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([
            Forms\Components\TextInput::make('metadata.slug')->unique(column: 'metadata->slug', ignoreRecord: true)
            ->required(),
            Forms\Components\Checkbox::make('is_published')->label('featured'),
            Forms\Components\DateTimePicker::make('published_at')->label('Published At'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                ->square()
                ->width(150)
                ->height(100),

                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogTwos::route('/'),
            'create' => Pages\CreateBlogTwo::route('/create'),
            'edit' => Pages\EditBlogTwo::route('/{record}/edit'),
        ];
    }
}
