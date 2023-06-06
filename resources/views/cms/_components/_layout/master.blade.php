<!doctype html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle === 'Home' ? '' : $pageTitle . ' | ' }} {{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="h-full">

        <div>

            <x-cms::_partials.navigation/>

            <div class="flex flex-1 flex-col md:pl-64">

                <x-cms::_partials.top-bar/>

                <main class="flex-1">
                    <div class="py-6">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        <script src="//unpkg.com/alpinejs" defer></script>

    </body>
</html>
