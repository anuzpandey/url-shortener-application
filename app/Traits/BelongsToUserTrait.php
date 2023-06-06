<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToUserTrait
{
    public function initializeBelongsToUserTrait(): void
    {
        $this->fillable[] = 'user_id';
        $this->casts += ['user_id' => 'integer'];
        $this->with += ['user'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
