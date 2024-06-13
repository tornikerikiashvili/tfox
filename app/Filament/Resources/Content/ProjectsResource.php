<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Content\Project;
use App\Filament\SimpleResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use FilamentTiptapEditor\TiptapEditor;
use Palindroma\Core\Filament\Resource;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Palindroma\Core\Forms\Components\SEOForm;
use Palindroma\Core\Filament\Tables\MediaColumn;
use Palindroma\Core\Forms\Components\MediaPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Palindroma\Core\Filament\Resources\ContentResource;
use App\Filament\Resources\Content\ProjectsResource\Pages;
use App\Filament\Resources\Content\ProjectsResource\RelationManagers;

class ProjectsResource extends SimpleResource
{
    protected static ?string $model = Project::class;

    protected static ?string $slug = 'content/projects';

    protected static ?string $navigationLabel = 'Projects';

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
                    MediaPicker::make('gallery')->label('Gallery')->multiple(),
                ])->columnSpan(2),
            ]);
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\TextInput::make('title')->label('Project Name'),

            Forms\Components\TextInput::make('type'),
            Forms\Components\Textarea::make('teaser'),
            RichEditor::make('content_top')->label('Content'),
            // RichEditor::make('content_bottom'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProjects::route('/create'),
            'edit' => Pages\EditProjects::route('/{record}/edit'),
        ];
    }
}
