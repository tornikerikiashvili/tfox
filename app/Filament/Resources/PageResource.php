<?php

namespace Palindroma\Core\Filament\Resources;

use Closure;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Facades\Filament;
use Palindroma\Core\Models\Page;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Actions\Action;
use Palindroma\Core\Forms\Components\SEOForm;
use Awcodes\DropInAction\Forms\Components\DropInAction;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Forms\Components\PageBuilder;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;

class PageResource extends \Z3d0X\FilamentFabricator\Resources\PageResource
{

    public static ?string $permissionGroup = 'pages';

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

    public static function canCreate(): bool
   {
      return false;
   }


    public static function getModel(): string
    {
        return Page::class;
    }

    public static function getTranslatableFields($locale): Tab
    {
        $tab = static::translatableFields(Tab::make(Str::of($locale)->ucfirst()->toString())->statePath($locale));

        $tab->schema([
            ...$tab->getChildComponents(),
            Section::make('SEO Settings')->schema([
                SEOForm::make('seo_settings'),
            ]),
        ]);

        collect($tab->getChildComponents())->each(function (Component $component) use ($locale) {
            if ($component instanceof Field) {

            }
        });

        return $tab;
    }

    public static function translatableFields(Tab $tab): Tab
    {
        return $tab->schema([
            PageBuilder::make('blocks')->maxItems(1)->disableItemDeletion()->disableItemMovement()
                ->label('Place the content of the entire page here. Leave lists blank if you want all items'),
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Group::make()
                    ->schema([
                        Group::make()->schema(FilamentFabricator::getSchemaSlot('blocks.before')),

                        Group::make()
                            ->statePath('resourceTranslations')
                            ->schema([
                                Tabs::make('Translations')->schema(
                                    collect(config('palindroma.supported_locales'))
                                        ->map(fn($locale) => static::getTranslatableFields($locale))
                                        ->toArray()
                                ),
                            ]),

                        Group::make()->schema(FilamentFabricator::getSchemaSlot('blocks.after')),
                    ])
                    ->columnSpan(2),

                Group::make()
                    ->columnSpan(1)
                    ->schema([
                        Group::make()->schema(FilamentFabricator::getSchemaSlot('sidebar.before')),

                        Card::make()
                            ->schema([
                                Placeholder::make('page_url')
                                    ->visible(fn(?PageContract $record) => config('filament-fabricator.routing.enabled') && filled($record))
                                    ->content(fn(?PageContract $record) => FilamentFabricator::getPageUrlFromId($record?->id)),

                                TextInput::make('title')
                                    ->label(__('filament-fabricator::page-resource.labels.title'))
                                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state, ?PageContract $record) {
                                        if (!$get('is_slug_changed_manually') && filled($state) && blank($record)) {
                                            $set('slug', Str::slug($state));
                                        }
                                    })
                                    ->debounce('500ms')
                                    ->required(),

                                Hidden::make('is_slug_changed_manually')
                                    ->default(false)
                                    ->dehydrated(false),

                                TextInput::make('slug')
                                    ->label(__('filament-fabricator::page-resource.labels.slug'))
                                    ->unique(ignoreRecord: true)
                                    ->afterStateUpdated(function (Closure $set) {
                                        $set('is_slug_changed_manually', true);
                                    })
                                    ->rule(function ($state) {
                                        return function (string $attribute, $value, Closure $fail) use ($state) {
                                            if ($state !== '/' && (Str::startsWith($value, '/') || Str::endsWith($value, '/'))) {
                                                $fail(__('filament-fabricator::page-resource.errors.slug_starts_or_ends_with_slash'));
                                            }
                                        };
                                    })
                                    ->required(),

                                    Hidden::make('layout')->default('default')->disabled(),

                                    Hidden::make('metadata.url_template')->default('${page.slug}')->disabled(),




                                //     DropInAction::make('copy-translations')
                                //         ->disableLabel()
                                //         ->execute(function (Closure $get, Closure $set) {
                                //             return Action::make('copy-translations')
                                //                 ->icon('heroicon-o-translate')
                                //                 ->label('Copy Translations')
                                //                 ->form([
                                //                     Select::make('from')
                                //                         ->label('From')
                                //                         ->options(collect(config('palindroma.supported_locales'))->mapWithKeys(fn($locale) => [$locale => Str::ucfirst($locale)]))
                                //                         ->required(),
                                //                     Select::make('to')
                                //                         ->label('To')
                                //                         ->options(collect(config('palindroma.supported_locales'))->mapWithKeys(fn($locale) => [$locale => Str::ucfirst($locale)]))
                                //                         ->required(),
                                //         ])

                                //         ->action(function (array $data) use ($get, $set): void {
                                //             $translatableAttributes = $get("resourceTranslations");

                                //             $sourceData = array_filter($translatableAttributes[$data['from']] ?? []);
                                //             $targetData = array_filter($translatableAttributes[$data['to']] ?? []);

                                //             $set("resourceTranslations.{$data['to']}", $sourceData);
                                //         });
                                // }),
                            ]),

                        Group::make()->schema(FilamentFabricator::getSchemaSlot('sidebar.after')),
                    ]),

            ]);
    }
}
