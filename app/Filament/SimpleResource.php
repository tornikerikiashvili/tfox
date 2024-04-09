<?php

namespace App\Filament;

use Closure;
use Filament\Forms;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Facades\Filament;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Field;
use Palindroma\Core\Filament\Resource;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Actions\Action;
use Awcodes\DropInAction\Forms\Components\DropInAction;
use Palindroma\Core\Filament\Resources\ContentResource;

class SimpleResource extends ContentResource
{
    protected static ?string $navigationGroup = 'Site Content';

    public static ?string $permissionGroup = 'site-content';

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
                ...static::getExtraFields(),
            ]);
    }

    public static function getExtraFields(): array
    {
        return [];
    }

    public static function getTranslatableFields($locale): Tab
    {
        $tab = static::translatableFields(Tab::make(Str::of($locale)->ucfirst()->toString())->statePath($locale));

        $tab->schema([
            ...$tab->getChildComponents(),
            ...static::defaultTranslatableFields(),
        ]);

        collect($tab->getChildComponents())->each(function (Component $component) use ($locale) {
            if ($component instanceof Field) {
                $component->hint("Translatable")->hintIcon('heroicon-o-translate');
            }
        });

        return $tab;
    }

    public static function defaultTranslatableFields(): array
    {
        return [];
    }

    public static function getMetaFields(): Card
    {
        $card = static::metaFields(Card::make());
        $card->schema([
            ...$card->getChildComponents(),
            ...static::defaultMetaFields(),
        ]);

        return $card;
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([

        ]);
    }

    public static function defaultMetaFields(): array
    {
        return [

            Forms\Components\Placeholder::make('created_at')
                ->label('Created Date')
                ->content(fn(?Model $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            Forms\Components\Placeholder::make('updated_at')
                ->label('Last Modified Date')
                ->content(fn(?Model $record): string => $record?->updated_at?->diffForHumans() ?? '-'),


            DropInAction::make('copy-translations')
                ->disableLabel()
                ->execute(function (Closure $get, Closure $set) {
                    return Action::make('copy-translations')
                        ->icon('heroicon-o-translate')
                        ->label('Copy Translations')
                        ->form([
                            Forms\Components\Select::make('from')
                                ->label('From')
                                ->options(collect(config('palindroma.supported_locales'))->mapWithKeys(fn($locale) => [$locale => Str::ucfirst($locale)]))
                                ->required(),
                            Forms\Components\Select::make('to')
                                ->label('To')
                                ->options(collect(config('palindroma.supported_locales'))->mapWithKeys(fn($locale) => [$locale => Str::ucfirst($locale)]))
                                ->required(),
                        ])
                        ->action(function (array $data) use ($get, $set): void {
                            $translatableAttributes = $get("resourceTranslations");

                            $sourceData = array_filter($translatableAttributes[$data['from']] ?? []);
                            $targetData = array_filter($translatableAttributes[$data['to']] ?? []);

                            $set("resourceTranslations.{$data['to']}", $sourceData);
                        });
                }),
        ];
    }

    public static function metaFields(Card $card): Card
    {
        return $card->schema([
        ]);
    }
}
