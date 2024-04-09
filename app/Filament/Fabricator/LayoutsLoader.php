<?php

namespace Palindroma\Core\Filament\Fabricator;

use Palindroma\Core\Filament\Fabricator\Layouts\DefaultLayout;
use Palindroma\Core\Filament\Fabricator\Layouts\ResourceDetailLayout;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class LayoutsLoader
{
    public function load(): void
    {
        FilamentFabricator::registerLayout(DefaultLayout::class);
        // FilamentFabricator::registerLayout(ResourceDetailLayout::class);
    }
}
