<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandingLinkStoreRequest;
use App\Models\Link;
use App\Repository\LinkRepository;
use App\Services\LinkService\LinkService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{
    public function show(Link $link)
    {
        $this->setPageTitle('Link');

        $link->load('views');

        return view('landing.link.show', [
            'link' => $link,
        ]);
    }

    public function store(LandingLinkStoreRequest $request, LinkRepository $linkRepository): RedirectResponse
    {
        try {
            $link = $linkRepository->store($request->validated());

            return $this->responseRedirect(
                route: route('landing.link.show', $link->shortened_url),
                message: $link,
                type: 'Link created successfully',
                error: 'success'
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
