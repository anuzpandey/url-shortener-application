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
                        <a href="{{ $link->secure_url }}" target="_blank" class="underline text-primary">{{ $link->secure_url }}</a>
                    </p>
                    <p class="text-lg">
                        <strong>Shorten Link :</strong>
                        <a href="{{ config('app.url') . '/' . $link->shortened_url }}" target="_blank" class="underline text-primary">{{ config('app.url') . '/' . $link->shortened_url }}</a>
                    </p>
                </div>
            </div>

            <div class="mx-auto">
                <div>

                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 border border-dashed border-primary">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-500 p-3">
                                    <i class="h-6 w-6 text-white" data-feather="mouse-pointer"></i>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Visits</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline">
                                <p class="text-xl font-semibold text-gray-900">{{ views($link)->count() }}</p>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 border border-dashed border-primary">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-500 p-3">
                                    <i class="h-6 w-6 text-white" data-feather="mouse-pointer"></i>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Unique Visits</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline">
                                <p class="text-xl font-semibold text-gray-900">{{ views($link)->unique()->count() }}</p>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 border border-dashed border-primary sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-500 p-3">
                                    <i class="h-6 w-6 text-white" data-feather="calendar"></i>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">{{ $link->expired_at?->isPast() ? 'Expired' : 'Expires' }} At</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline">
                                <p class="text-xl font-semibold text-gray-900">{{ $link->expired_at?->diffForHumans() ?? 'NA' }}</p>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 border border-dashed border-primary sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-500 p-3">
                                    <i class="h-6 w-6 text-white" data-feather="user"></i>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Added By</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline">
                                <p class="text-xl font-semibold text-gray-900">{{ $link->user?->name ?? 'NA' }}</p>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>



        <x-landing::bg-gradient-bottom/>
    </div>

</x-landing::_layout.master>
