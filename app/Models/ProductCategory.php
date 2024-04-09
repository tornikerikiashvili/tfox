<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Palindroma\Core\Models\ContentModel;
use SolutionForest\FilamentTree\Concern\ModelTree;

class ProductCategory extends ContentModel
{
    use ModelTree;

    public array $translatable = [
        'title',
        'slide_title',
    ];

    protected $fillable = ["parent_id", "title", "order", "slide_title"];

    protected $casts = [
        'title' => 'json',
        'slide_title' => 'json',
    ];

    public static array $mediaAttributes = [
        'metadata.cover_image',
    ];


    protected $table = 'product_categories';
}
