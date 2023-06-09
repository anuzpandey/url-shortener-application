<x-landing::_layout.master>

    <div class="relative px-6 lg:px-8">
        <div class="mx-auto max-w-7xl py-24">
            <div class="border border-dashed rounded-lg border-gray-500 flex gap-8 p-8 items-center">
                <div class="avatar placeholder">
                    <div class="bg-neutral-focus shrink-0 text-neutral-content rounded-full w-32 text-5xl">
                        <span>{{ \Illuminate\Support\Str::initials($link->title) }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <h1 class="text-3xl font-medium">{{ Str::title($link->title) }}</h1>
                    <p class="text-lg">
                        <strong>Original Link :</strong>
                        <a href="" class="underline text-primary">{{ $link->url }}</a>
                    </p>
                    <p class="text-lg">
                        <strong>Shorten Link :</strong>
                        <a href="" class="underline text-primary">{{ config('app.url') . '/' . $link->shortened_url }}</a>
                    </p>
                </div>
            </div>
        </div>

        <x-landing::bg-gradient-bottom/>
    </div>

</x-landing::_layout.master>
