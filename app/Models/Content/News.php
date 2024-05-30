<?php

namespace App\Models\Content;


use Palindroma\Core\Models\Tag;
use Palindroma\Core\Models\ContentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends ContentModel
{
    protected $table = 'content_blog';

    public array $translatable = [
        'title',
        'teaser',
        'content',
        'cover_image',
    ];

    protected $fillable = [
        'title',
        'teaser',
        'content',
        'cover_image',
        'inner_cover_image',
        'is_published',
        'published_at',
        'category_id',
    ];

    public static array $mediaAttributes = [
        'cover_image',
        'inner_cover_image.*'
    ];


    protected $casts = [
        'title' => 'json',
        'teaser' => 'json',
        'content' => 'json',
        'inner_cover_image' => 'json',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'category_id' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'category_id');
    }

}
