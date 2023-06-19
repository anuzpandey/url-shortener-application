<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Repository\LinkRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    public function __construct(
        public LinkRepository $linkRepository
    ) {}

    public function index()
    {
        $this->setPageTitle('Links');

        return view('cms.links.index');
    }

    public function show(Link $link)
    {
        $this->setPageTitle(($link->title ?? $link->url) . ' - Link Details');

        $link->load('views');

        $chartData = DB::table('views')
            ->where('viewable_id', $link->id)
            ->where('viewable_type', Link::class)
            ->groupBy(DB::raw('DATE_FORMAT(viewed_at, "%Y-%m-%d")'))
            ->orderBy('date')
            ->get([
                DB::raw('DATE_FORMAT(viewed_at, "%Y-%m-%d") as date'),
                DB::raw('COUNT(*) as views'),
            ]);

        $statistics = $this->linkRepository->getStatistics($link);

        return view('cms.links.show', [
            'link' => $link,
            'statistics' => $statistics,
            'chartData' => $chartData,
        ]);
    }

    public function destroy(Link $link): RedirectResponse
    {
        $link->deleted_at
            ? $link->forceDelete()
            : $link->delete();

        return $this->responseRedirectBack('Link deleted successfully.', 'success', true, true);
    }
}
