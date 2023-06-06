<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait SetErrorViewTrait
{
    protected function showErrorPage($errorCode = 404, $message = null): Response
    {
        $data['message'] = $message;

        return response()->view('errors.' . $errorCode, $data, $errorCode);
    }
}
