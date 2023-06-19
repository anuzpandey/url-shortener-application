<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandingLinkStoreRequest;
use App\Models\Link;
use App\Repository\LinkRepository;
use App\Services\LinkService\LinkService;
use AshAllenDesign\FaviconFetcher\Facades\Favicon;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{
    public function __construct(
        public LinkRepository $linkRepository
    ) {}

    public function show(Link $link)
    {
        $this->setPageTitle('Link');

        $link->load('views');

        $chartData = $this->linkRepository->getChartData($link);

        $statistics = $this->linkRepository->getStatistics($link);

        return view('landing.link.show', [
            'link' => $link,
            'statistics' => $statistics,
            'chartData' => $chartData,
        ]);
    }

    public function store(LandingLinkStoreRequest $request): RedirectResponse
    {
        try {
            $link = $this->linkRepository->store($request->validated());

            return $this->responseRedirect(
                route: route('landing.link.show', $link->shortened_url),
                message: 'Link created successfully',
            );
        } catch (Exception $exception) {
            return $this->responseRedirectBack(
                message: $exception->getMessage(),
                type: 'error',
                error: true,
                withOldInputWhenError: true
            );
        }

    }
}
