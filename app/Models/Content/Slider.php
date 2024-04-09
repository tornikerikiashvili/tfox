<?php

namespace App\Models\Content;

use Palindroma\Core\Models\ContentModel;
use Palindroma\Core\Models\Tag;

class Slider extends ContentModel
{
    protected $table = 'content_slider';

    public array $translatable = [
        'title',
        'teaser',
        'cta_button',
    ];

    protected $fillable = [
        'title',
        'teaser',
        'cta_button',
        'images',
    ];

    protected $casts = [
        'title' => 'json',
        'teaser' => 'json',
        'cta_button' => 'json',
        'images' => 'json',
    ];

    public static array $mediaAttributes = [
        'images.mob',
        'images.desk',
    ];

}
