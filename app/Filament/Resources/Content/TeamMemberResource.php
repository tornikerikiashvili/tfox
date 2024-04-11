<?php

namespace App\Filament\Resources\Content;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Content\TeamMember;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Palindroma\Core\Filament\Tables\MediaColumn;
use Palindroma\Core\Forms\Components\MediaPicker;
use Palindroma\Core\Filament\Resources\ContentResource;
use App\Filament\Resources\Content\TeamMemberResource\Pages;

class TeamMemberResource extends ContentResource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $slug = 'content/team-members';

    protected static ?string $recordTitleAttribute = 'title';

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
                    MediaPicker::make('image')
                ])->columnSpan(2),
            ]);
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            Forms\Components\TextInput::make('title')->label('Name'),
            Forms\Components\Textarea::make('teaser')->label('Position'),

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
            ->columns([
                MediaColumn::make('image')->square()->width(80)->height(110),
                Tables\Columns\TextColumn::make('title')->label('Name'),
                Tables\Columns\TextColumn::make('teaser')->label('Position'),

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
            'index' => Pages\ListResources::route('/'),
            'create' => Pages\CreateResource::route('/create'),
            'edit' => Pages\EditResource::route('/{record}/edit'),
        ];
    }
}
