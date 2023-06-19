<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class LinkDetailsCommand extends Command
{

    protected $signature = 'link:details {link : The shortened URL Code}';

    protected $description = 'Get the details of a shortened URL';

    public function handle(): void
    {
        $link = $this->argument('link');

        $link = Link::query()
            ->withTrashed()
            ->where('shortened_url', $link)
            ->first();

        if (!$link) {
            $this->line('<fg=red;>Whoops! The given link does not exist. ....................... [ERROR]</>');
            exit;
        }

        if ($link->trashed()) {
            $this->line('<fg=red>Whoops! The given link has been deleted. ....................... [ERROR]</>');
            $this->line('<fg=red>Code: ' . Response::HTTP_GONE . ' ..................... [ERROR]</>');
            exit;
        }


        $this->info('Link details:');
        $this->line('ID: ' . $link->id);
        $this->line('Title: ' . Str::of($link->title)->title()->replace('-', ' '));
        $this->line('URL: ' . $link->secure_url);
        $this->line('Shortened URL: ' . config('app.url') . '/' . $link->shortened_url);
        $this->line('Expired at: ' . $link->expired_at?->format('Y-m-d') ?? 'NA');
    }
}
