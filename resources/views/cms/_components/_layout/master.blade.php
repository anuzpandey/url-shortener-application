<!doctype html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle === 'Home' ? '' : \Illuminate\Support\Str::title($pageTitle) . ' | ' }} {{ config('app.name') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles

        @stack('styles')
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

        @livewireScripts

        @stack('scripts')

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                Livewire.hook('element.updated', (el, component) => {
                    feather.replace();
                })
            });
        </script>

    </body>
</html>
