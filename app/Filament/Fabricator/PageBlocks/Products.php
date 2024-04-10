<?php

namespace App\Filament\Fabricator\PageBlocks;



use App\Models\Ecommerce\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder\Block;
use Palindroma\Core\Filament\Fabricator\PageBlocks\ContentComponentBlock;

class Products extends ContentComponentBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('products')
            ->label('Products')
            ->schema([
                Section::make('Products')->schema([
                    Select::make('products')->label('Choose products')
                    ->options(fn() => Product::all()->pluck('title.main', 'id'))
                    ->searchable()->multiple(),
                ])->columns(1),



        ]);
    }
}
