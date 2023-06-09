<?php

namespace App\Services\LinkService;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LinkService
{
    public function getTemporaryUserId(): string
    {
        if (Session::has('temporary_user_id')) {
            $temporaryUserId = Session::get('temporary_user_id');
        } else {
            $temporaryUserId = uniqid('', true);
            Session::put('temporary_user_id', $temporaryUserId);
        }

        return $temporaryUserId;
    }

    public function generateShortenedUrl(): string
    {
        return Str::random(6);
    }
}
