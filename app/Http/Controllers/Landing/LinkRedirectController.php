<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Traits\RecordPageViews;
use Illuminate\Http\Request;

class LinkRedirectController extends Controller
{
    use RecordPageViews;

    public function __invoke(Link $link)
    {
        $this->recordPageViews($link);

        return $link;
    }
}
