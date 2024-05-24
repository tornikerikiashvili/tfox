<?php

namespace App\Models\Ecommerce;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Palindroma\Core\Models\ContentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends ContentModel
{
    protected $table = 'ecommerce_products';

    public array $translatable = [
        'name',
        'title',
        'content',
    ];

    protected $fillable = [
        'name',
        'title',
        'slug',
        'content',
        'category_id',
        'cover_image',
        'gallery',
        'metadata',
    ];

    public static array $mediaAttributes = [
        'gallery.*',
        'cover_image'
    ];

    protected $casts = [
        'name' => 'json',
        'title' => 'json',
        'slug' => 'string',
        'name' => 'content',
        'gallery' => 'json',
        'category_id' => 'integer',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
}
