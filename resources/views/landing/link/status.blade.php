<x-landing::_layout.master>

    <div class="relative px-6 lg:px-8">
        <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight uppercase text-gray-900 sm:text-6xl">{{ $code }}</h1>
                <h1 class="font-medium tracking-tight uppercase text-gray-900 sm:text-4xl mt-4">{{ $status }}</h1>
                <p class="mt-4 text-lg leading-8 text-gray-600">{{ $message }}</p>

                <div class="mt-6 flex items-center justify-center gap-x-6">
                    <a type="submit" href="{{ route('landing.index') }}" class="rounded-md bg-indigo-600 px-6 py-2 text-base font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Back to Home
                    </a>
                </div>

                @csrf
            </div>
        </div>

        <x-landing::bg-gradient-bottom/>
    </div>

</x-landing::_layout.master>
