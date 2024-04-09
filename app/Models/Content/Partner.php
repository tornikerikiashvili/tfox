<?php

namespace App\Models\Content;

use Palindroma\Core\Models\ContentModel;

class Partner extends ContentModel
{
    protected $table = 'content_partners';

    public array $translatable = [
        'title',
        'link',
        'image',
    ];

    protected $fillable = [
        'title',
        'link',
        'image',
        'order_column'
    ];

    public static array $mediaAttributes = [
        'image.*'
    ];

    protected $casts = [
        'title' => 'json',
        'link' => 'json',
        'image' => 'json',
    ];

}
