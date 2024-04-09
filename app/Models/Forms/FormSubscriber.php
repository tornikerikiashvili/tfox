<?php

namespace App\Models\Forms;

use Palindroma\Core\Models\Model;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class FormSubscriber extends Model
{
    protected $table = 'form_subscribers';

    protected $fillable = [
        'email',
        'metadata',
    ];

    protected $casts = [
        'metadata' => SchemalessAttributes::class,
    ];
}
