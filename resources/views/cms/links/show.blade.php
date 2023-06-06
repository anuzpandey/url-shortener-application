<x-cms::_layout.master>

    <x-cms::page-header>
        <li>
            <a href="{{ route('cms.links.index') }}">
                <i data-feather="link" class="w-4 h-4 mr-2"></i>
                Links
            </a>
        </li>
        <li>
            <i data-feather="info" class="w-4 h-4 mr-2"></i>
            Link Details
        </li>
    </x-cms::page-header>

    <div class="mx-auto px-4 sm:px-6 md:px-8">
        <div>

            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 shadow">
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

                <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 shadow">
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

                <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 shadow sm:px-6 sm:pt-6">
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

                <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 shadow sm:px-6 sm:pt-6">
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

</x-cms::_layout.master>
