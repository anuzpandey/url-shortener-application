<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $this->setPageTitle('Dashboard');

        return view('cms.dashboard.index');
    }
}
