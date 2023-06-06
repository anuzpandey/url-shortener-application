<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $this->setPageTitle('Links');

        return view('cms.links.index');
    }

    public function show(Link $link)
    {
        return $link;
    }

    public function destroy(Link $link): RedirectResponse
    {
        $link->delete();

        return $this->responseRedirectBack('Link deleted successfully.', 'success', true, true);
    }
}
