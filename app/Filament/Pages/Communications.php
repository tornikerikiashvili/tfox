<?php

namespace App\Filament\Pages;


use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Filament\Pages\SettingsPage;
use App\Settings\SocialsSettings;
use App\Settings\ContactsSettings;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;
use App\Settings\CommunicationsSettings;
use Filament\Forms\Components\TextInput;

class Communications extends SettingsPage
{

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $settings = CommunicationsSettings::class;

    protected static ?string $navigationLabel = 'Communication';

    protected static ?string $navigationGroup = 'Configurations';

    public static ?string $permissionGroup;

    public static function getPermissionGroup(): ?string
    {
        return static::$permissionGroup ?? static::getNavigationGroup();
    }

    public static function can(string $action, ?Model $record = null): bool
    {
        if (!static::getPermissionGroup()) {
            return parent::can($action, $record);
        }
        $action = match ($action) {
            'viewAny' => 'view',
            'deleteAny', 'forceDelete', 'forceDeleteAny' => 'delete',
            'replicate' => 'update',
            default => $action,
        };

        return Filament::auth()->user()->can(Str::of(static::getPermissionGroup())
            ->lower()
            ->append(":$action")
            ->toString());
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Contact')
            ->compact()
            ->collapsible()
            ->schema([
                    Grid::make(3)->schema([
                        TextInput::make('contacts.email')->label('E-mail'),
                        TextInput::make('contacts.phone')->label('Phone Number'),
                        TextInput::make('contacts.address')->label('Address Geo'),
                        TextInput::make('contacts.address_en')->label('Address Eng'),
                        TextInput::make('contacts.direction_link')->label('Map Direction'),
                        Fieldset::make('Emails For Form Communication')
                            ->schema([
                                Grid::make()
                                    ->schema([
                                        TextInput::make('contacts.form.contact_form')->label('Mail For Main Contact Form'),

                                    ])

                            ])
                    ]),

                        ]),
                        Section::make('Social Links')
                                ->compact()
                                ->collapsible()
                                ->schema([
                        Repeater::make('socials.links')
                                ->schema([
                                    TextInput::make('title')->label('title'),
                                    TextInput::make('link'),

                        ])
                        ->columns(2)

            ])
        ];
    }


    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['contacts'] = ContactsSettings::from($data['contacts'] ?? []);
        $data['socials'] = SocialsSettings::from($data['socials'] ?? []);

        return $data;

    }

}
