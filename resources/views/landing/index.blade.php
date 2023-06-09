<x-landing::_layout.master>

    <div class="relative px-6 lg:px-8">
        <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full py-1 px-3 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Announcing our easy and powerful API
                    <a href="#" class="font-semibold text-indigo-600 ml-2">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        Read more
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
            <form class="text-center" method="POST" action="{{ route('landing.link.store') }}">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Create Short Links</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">URL Shortener is a custom short link personalization
                    tool that enables you to target, engage, and drive more customers.</p>

                <div class="mt-4">
                    <div
                        x-data="{ show: true, options: false }"
                        class="grid grid-cols-3 gap-6
                    ">

                        <x-landing::session-error-messages/>

                        <div class="col-span-3">
                            <label for="url" class="sr-only">Your URL</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-4 text-sm text-gray-500">
                                    <i data-feather="link" class="w-5 h-5"></i>
                                </span>
                                <input
                                    id="url"
                                    name="url"
                                    type="url"
                                    required
                                    placeholder="Paste a link to shorten it"
                                    autocomplete="url"
                                    class="block py-4 px-4 w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div class="-mt-2 text-center w-full flex justify-end col-span-3">
                            <p
                                @click="options = !options"
                                class="text-primary inline-flex items-center gap-2 text-sm cursor-pointer"
                            >
                                <span>Options </span>
                                <i class="w-3 h-3 font-medium" data-feather="corner-right-down"></i>
                            </p>
                        </div>

                        <div
                            x-cloak
                            x-show="options"
                            class="col-span-3 text-left -mt-6"
                        >
                            <label for="expired_at" class="text-left">Expired Date</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-4 text-sm text-gray-500">
                                    <i data-feather="calendar" class="w-5 h-5"></i>
                                </span>
                                <input
                                    id="expired_at"
                                    name="expired_at"
                                    type="date"
                                    onfocus="this.showPicker()"
                                    placeholder="Expiry Date"
                                    class="block py-4 px-4 w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-center gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-6 py-2 text-base font-semibold leading-7 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Shorten
                    </button>
                </div>

                <div class="mt-6">
                    <p class="text-gray-400 uppercase">Use it. Its free and Fast.</p>
                </div>

                @csrf
            </form>
        </div>

        <x-landing::bg-gradient-bottom/>
    </div>

</x-landing::_layout.master>
