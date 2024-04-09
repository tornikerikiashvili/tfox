<?php

namespace App\Filament\Resources\Forms;

use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FormResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Communication';

    public static ?string $permissionGroup = 'forms';

    protected static bool $shouldRegisterNavigation = false;

    public static function getBreadcrumb(): string
    {
        $breadcrumb = parent::getBreadcrumb();

        return "Communication > $breadcrumb";
    }

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
}
