<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkRedirectController extends Controller
{
    public function __invoke(Link $link)
    {
        return $link;
    }
}
