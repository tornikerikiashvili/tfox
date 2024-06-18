<?php

namespace App\Models\Content;

use Palindroma\Core\Models\ContentModel;

class BlogTwo extends ContentModel
{
    protected $table = 'content_blog_two';

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
}
