<?php

namespace App\Http\Controllers;

use App\Traits\SetErrorViewTrait;
use App\Traits\SetPageTitleTrait;
use App\Traits\SetResponseRedirectTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Application Traits
    use SetPageTitleTrait, SetResponseRedirectTrait, SetErrorViewTrait;
}
