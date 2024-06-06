<?php

namespace App\Models\Content;

use Palindroma\Core\Models\ContentModel;


class Project extends ContentModel
{
    protected $table = 'content_projects';

    public array $translatable = [
        'title',
        'teaser',
        'type',
        'content_top',
        'content_bottom',

    ];

    protected $fillable = [
        'title',
        'teaser',
        'type',
        'content_top',
        'content_bottom',
        'cover_image',
        'gallery',
        'is_published',
        'published_at',
        'category_id',
    ];

    public static array $mediaAttributes = [
        'cover_image',
        'gallery.*'
    ];


    protected $casts = [
        'title' => 'json',
        'teaser' => 'json',
        'content_top' => 'json',
        'content_bottom' => 'json',
        'gallery' => 'json',
        'published_at' => 'datetime',
        'category_id' => 'integer',
    ];
}
