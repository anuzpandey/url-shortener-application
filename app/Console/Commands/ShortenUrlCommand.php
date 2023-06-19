<?php

namespace App\Console\Commands;

use App\DataTransferObjects\LinkDto;
use App\Repository\LinkRepository;
use Illuminate\Console\Command;
use Validator;

class ShortenUrlCommand extends Command
{

    protected $signature = 'shorten:url
                            {url : The URL to shorten}
                            {expired_at? : The expiration date of the shortened URL}';

    protected $description = 'Shorten a given URL';

    public function handle(LinkRepository $linkRepository): void
    {
        $validated = $this->validateArguments();

        $data = new LinkDto(
            url: $validated['url'],
            expired_at: $validated['expired_at'],
        );

        $shortenedUrl = $linkRepository->store($data->toArray());

        $shortenedSecureUrl = config('app.url') . '/' . $shortenedUrl->shortened_url;

        $this->info("Shortened URL: {$shortenedSecureUrl}");
    }

    public function validateArguments()
    {
        $validator = Validator::make($this->arguments(), [
            'url' => 'required|max:255',
            'expired_at' => 'nullable|date|after:today',
        ], [
            'expired_at.date' => 'The expiration date must be a valid date format (YYYY-MM-DD).',
        ]);

        if ($validator->fails()) {
            $this->error('Whoops! The given options are invalid.');

            collect($validator->errors()->all())->each(fn($error) => $this->line($error));
            exit;
        }

        return $validator->validated();
    }
}
