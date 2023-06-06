<?php

namespace App\Models;

use App\Traits\BelongsToUserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    use BelongsToUserTrait;

    protected $fillable = [
        'title',
        'url',
        'shortened_url',
        'counter',
        'expired_at',
    ];

    protected $casts = [
        'expired_at' => 'datetime',
    ];
}
