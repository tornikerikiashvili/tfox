<?php

namespace App\Models\Content;

use Palindroma\Core\Models\ContentModel;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends ContentModel
{

    protected $table = 'content_team_members';

    public array $translatable = [
        'title',
        'teaser',
    ];

    protected $fillable = [
        'title',
        'teaser',
        'image',
    ];

    protected $casts = [
        'title' => 'json',
        'teaser' => 'json',
    ];

    public static array $mediaAttributes = [
        'image'
    ];
}
