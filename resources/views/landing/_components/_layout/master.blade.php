<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="min-h-screen">


        <div class="isolate bg-white">
            <x-landing::bg-gradient/>

            <x-landing::_partials.navigation/>

            <main>
                {{ $slot }}
            </main>
        </div>

    </body>
</html>
