<?php

namespace App\Repository;

use App\Models\Link;
use App\Services\LinkService\LinkService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LinkRepository
{
    public function __construct(
        public LinkService $linkService
    )
    {
    }

    public function store(array $payload): Link
    {
        return Link::create([
            ...$payload,
            'shortened_url' => $this->linkService->generateShortenedUrl(),
            'temporary_user_id' => $this->linkService->getTemporaryUserId(),
        ]);
    }

    public function getStatistics(Link $link): Collection
    {
        return collect([
            (object)[
                'title' => 'Total Visits',
                'value' => views($link)->count(),
                'icon' => 'mouse-pointer',
                'tooltip' => [],
            ],
            (object)[
                'title' => 'Total Unique Visits',
                'value' => views($link)->unique()->count(),
                'icon' => 'mouse-pointer',
                'tooltip' => [],
            ],
            (object)[
                'title' => $link->expired_at?->isPast() ? 'Expired At' : 'Expires At',
                'value' => $link->expired_at?->diffForHumans() ?? 'NA',
                'icon' => 'calendar',
                'tooltip' => [
                    'value' => $link->expired_at?->format('d M Y'),
                ],
            ],
            (object)[
                'title' => 'Added By',
                'value' => $link->user?->name ?? 'NA',
                'icon' => 'user',
                'tooltip' => [],
            ]
        ]);
    }

    public function getChartData(Link $link): Collection
    {
        return DB::table('views')
            ->where('viewable_id', $link->id)
            ->where('viewable_type', Link::class)
            ->groupBy(DB::raw('DATE_FORMAT(viewed_at, "%Y-%m-%d")'))
            ->orderBy('date')
            ->get([
                DB::raw('DATE_FORMAT(viewed_at, "%Y-%m-%d") as date'),
                DB::raw('COUNT(*) as views'),
            ]);
    }
}
