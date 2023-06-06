<?php

namespace App\Models;

use App\Traits\BelongsToUserTrait;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;

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
