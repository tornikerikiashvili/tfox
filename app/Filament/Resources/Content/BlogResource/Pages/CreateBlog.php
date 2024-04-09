<?php

namespace App\Filament\Resources\Content\BlogResource\Pages;

use App\Filament\Resources\Content\BlogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;
}
