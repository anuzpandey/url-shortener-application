<!doctype html>
<html class="h-full bg-gray-50" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login - {{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>

    <body class="h-full isolate">

        <x-landing::bg-gradient/>

        <div class="flex min-h-screen flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md flex flex-col justify-center">
                <x-landing::logos.logo-dark class="mx-auto"/>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
                <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">

                    <x-landing::alerts.errors/>

                    <form class="space-y-2" action="{{ route('authentication.login.authenticate') }}" method="POST">

                        <x-landing::form-elements.input-field
                            name="email"
                            type="email"
                            label="Email Address"
                            required
                        />

                        <x-landing::form-elements.input-field
                            name="password"
                            type="password"
                            label="Password"
                            required
                        />

                        <x-landing::form-elements.checkbox
                            name="remember_me"
                            label="Remember me"
                        />

                        <button class="btn btn-block btn-primary">Login</button>

                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <x-landing::bg-gradient-bottom/>

    </body>
</html>
