<?php

namespace App\Repository;

use App\Models\Link;
use App\Services\LinkService\LinkService;

class LinkRepository
{
    public function __construct(
        public LinkService $linkService
    ) {}

    public function store(array $payload): Link
    {
        return Link::create([
            ...$payload,
            'shortened_url' => $this->linkService->generateShortenedUrl(),
            'temporary_user_id' => $this->linkService->getTemporaryUserId(),
        ]);
    }
}
