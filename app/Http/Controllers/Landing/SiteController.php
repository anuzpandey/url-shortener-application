<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {
        $this->setPageTitle('Home');

        return view('landing.index');
    }
}
