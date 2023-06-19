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

        if ($link->deleted_at) {
            $this->setPageTitle('Link deleted');

            return view('landing.link.status', [
                'message' => 'The link you\'re trying to visit has been deleted.',
                'status' => 'DELETED',
                'code' => '410',
            ]);
        }

        if ($link->expired_at?->isPast()) {
            $this->setPageTitle('Link expired');

            return view('landing.link.status', [
                'message' => 'The link you\'re trying to visit has been expired.',
                'status' => 'EXPIRED',
                'code' => '498',
            ]);
        }

        return redirect()->away($link->secure_url);
    }
}
