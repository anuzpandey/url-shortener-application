<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $pageTitle === 'Home' ? '' : $pageTitle . ' | ' }} {{ config('app.name') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">

        @vite(['resources/css/app.css', 'resources/js/landing-scripts.js'])
        @stack('styles')
    </head>
    <body class="min-h-screen">

        <div class="isolate bg-white">
            <x-landing::bg-gradient/>

            <x-landing::_partials.navigation/>

            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')

    </body>
</html>
