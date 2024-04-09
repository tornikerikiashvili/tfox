<?php

namespace App\Filament\Resources\Forms;

use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\Forms\FormSubscriber;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Actions\DeleteBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\Forms\FormSubscriberResource\Pages;

class FormSubscriberResource extends FormResource
{
    protected static ?string $model = FormSubscriber::class;

    protected static ?string $slug = 'form-subscribers';

    protected static ?string $recordTitleAttribute = 'email';

    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $navigationLabel = 'Subscribers';

    public static ?string $permissionGroup = 'site-content';

    protected static ?string $modelLabel = "Subscriber";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->required(),

                TextInput::make('metadata')
                    ->required(),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?FormSubscriber $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?FormSubscriber $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime(),

                TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime(),
            ])
            ->bulkActions([

                ExportBulkAction::make()->exports([
                    ExcelExport::make()->withColumns([
                        Column::make('email')->heading('Subscribers'),

                    ]),
                ]),
                DeleteBulkAction::make(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormSubscribers::route('/'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['email'];
    }
}
