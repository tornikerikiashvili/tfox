<?php

namespace App\Models\Forms;

use Palindroma\Core\Models\Model;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class FormFeedback extends Model
{
    protected $table = 'form_feedbacks';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'comment',
        'metadata',
    ];

    protected $casts = [
        'metadata' => SchemalessAttributes::class,
    ];
}
