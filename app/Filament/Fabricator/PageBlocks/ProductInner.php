<?php

namespace App\Filament\Fabricator\PageBlocks;



use App\Models\Ecommerce\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder\Block;
use Palindroma\Core\Filament\Fabricator\PageBlocks\ContentComponentBlock;

class ProductInner extends ContentComponentBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('product-inner')
            ->label('ProductInner')
            ->schema([
                Section::make('Page Cover')->schema([
                    FileUpload::make('page_cover')->label('Cover Image'),
                ])->columns(1),

                Section::make('Products')->schema([
                    Select::make('products')->label('Choose products')
                    ->options(fn() => Product::all()->pluck('title.main', 'id'))
                    ->searchable()->multiple(),
            ])->columns(1),
        ]);
    }
}
