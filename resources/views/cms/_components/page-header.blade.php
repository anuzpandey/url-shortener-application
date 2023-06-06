<div class="mx-auto px-4 sm:px-6 md:px-8">
    <h1 class="text-2xl font-semibold text-gray-900">{{ $pageTitle }}</h1>

    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <a href="{{ route('cms.dashboard.index') }}">
                    <svg class="mr-2 flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            {{ $slot }}
        </ul>
    </div>
</div>
