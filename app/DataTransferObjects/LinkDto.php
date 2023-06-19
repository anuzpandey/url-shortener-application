<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;

class LinkDto
{

    public function __construct(
        public string  $url,
        public ?string $expired_at = null,
        public ?string $title = null,
    )
    {
    }

    public static function fromRequest(array $payload): self
    {
        return new self(
            url: $payload['url'],
            expired_at: $payload['expired_at'] ?? null,
        );
    }


    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'expired_at' => $this->expired_at,
            'title' => Str::extractDomainName($this->url),
        ];
    }


}
