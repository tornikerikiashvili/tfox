<?php

namespace App\Providers;

use Closure;
use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\App;
use Filament\Forms\Components\Radio;
use Illuminate\Support\Facades\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\View\Composers\HeaderViewComposer;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::addNamespace('sitemap', base_path('vendor/spatie/laravel-sitemap/resources/views/sitemap'));



        Filament::serving(function () {
            FilamentNavigation::addItemType('External Link', [


                Tabs::make('Translations')->schema(
                    collect(config('palindroma.supported_locales'))
                        ->map(function ($locale) {
                            return Tab::make(Str::of($locale)->ucfirst()->toString())->statePath($locale)->schema(
                                [
                                    TextInput::make('title')
                                        ->label('Title')
                                        ->hint("Translatable")->hintIcon('heroicon-o-translate')
                                        ->required(),
                                ]
                            );
                        })
                        ->toArray()
                ),

                FileUpload::make('image'),
                TextInput::make('url')
                    ->label(__('filament-navigation::filament-navigation.attributes.url'))
                    ->required(),
                Select::make('target')
                    ->label(__('filament-navigation::filament-navigation.attributes.target'))
                    ->options([
                        '' => __('filament-navigation::filament-navigation.select-options.same-tab'),
                        '_blank' => __('filament-navigation::filament-navigation.select-options.new-tab'),
                    ])
                    ->default(''),
                    ]);


            FilamentFabricator::registerSchemaSlot('sidebar.after', function () {
                return [
                    // Card::make()
                    //     ->schema([
                    //         Toggle::make('metadata.has_breadcrumb')->label('Page Header'),
                    //     ]),
                ];
            });
        });


        App::terminating(function () {
            if (DB::hasModifiedRecords()) {
                $cache = Cache::supportsTags() ? Cache::tags(['pages']) : Cache::driver();
                $cache->flush();
            }
        });
    }
}
