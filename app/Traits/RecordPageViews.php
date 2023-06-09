<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait RecordPageViews
{
    public function recordPageViews(Model $model, $enableCoolDown = false, $coolDown = NULL): void
    {
        $coolDownValue = $enableCoolDown
            ? $coolDown ?? config('app.eloquent_viewable_cooldown_minutes')
            : 0;

        if ($enableCoolDown) {
            views($model)
                ->cooldown(now()->addMinutes($coolDownValue))
                ->record();

            return;
        }

        views($model)->record();
    }
}
