<?php

namespace App\Models;

use App\Traits\BelongsToUserTrait;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Link extends Model implements Viewable
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithViews;

    use BelongsToUserTrait;

    protected bool $removeViewsOnDelete = true;

    protected $fillable = [
        'title',
        'url',
        'shortened_url',
        'expired_at',
        'temporary_user_id',
    ];

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    // Laravel 9 new accessor attribute for url
    protected function secureUrl(): Attribute
    {
        return Attribute::make(
            get: static function (mixed $value, array $attributes) {
                return Str::ensureSecureUrl($attributes['url']);
            },
        );
    }
}
