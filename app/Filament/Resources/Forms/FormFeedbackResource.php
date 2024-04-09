<?php

namespace App\Filament\Resources\Forms;

use App\Filament\Resources\Forms\FormFeedbackResource\Pages;
use App\Models\Forms\FormFeedback;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class FormFeedbackResource extends FormResource
{
    protected static ?string $model = FormFeedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static ?string $slug = 'form-feedbacks';

    protected static bool $shouldRegisterNavigation = true;

    public static ?string $permissionGroup = 'site-content';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Contact Feedbacks';

    protected static ?string $modelLabel = "Contact Feedback";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //TextInput::make('subject'),

                TextInput::make('name'),

                TextInput::make('email'),

                TextInput::make('phone_number'),

                TextInput::make('comment'),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?FormFeedback $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?FormFeedback $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //TextColumn::make('subject'),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone_number'),

                TextColumn::make('comment'),

                TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime(),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormFeedbacks::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
}
