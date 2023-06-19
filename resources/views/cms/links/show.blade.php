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
        <div class="mt-5">

            <div class="bg-white border border-dashed rounded-lg border-gray-500 flex gap-8 p-8 items-center relative">

                @if($link->expired_at?->isPast())
                    <div class="absolute -top-5 right-4">
                        <span class="inline-flex items-center px-6 py-2 rounded-full text-base font-medium bg-red-100 text-red-800">
                            Expired
                        </span>
                    </div>
                @endif

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
                        @foreach($statistics as $statistic)
                            <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 border border-dashed border-primary hover:bg-gray-50 transition-colors">
                                <dt>
                                    <div class="absolute rounded-md bg-indigo-500 p-3">
                                        <i class="h-6 w-6 text-white" data-feather="mouse-pointer"></i>
                                    </div>
                                    <p class="ml-16 truncate text-sm font-medium text-gray-500">{{ $statistic->title }}</p>
                                </dt>
                                <dd class="ml-16 flex items-baseline">
                                    @if($statistic->tooltip)
                                        <div class="tooltip" data-tip="{{ $statistic->tooltip['value'] }}">
                                            <p class="text-xl font-semibold text-gray-900">{{ $statistic->value }}</p>
                                        </div>
                                    @else
                                        <p class="text-xl font-semibold text-gray-900">{{ $statistic->value }}</p>
                                    @endif
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>

            <div class="mx-auto mt-10">
                <div class="bg-white border border-dashed rounded-lg border-gray-500 flex flex-col gap-4 p-6">
                    <h1 class="text-lg font-medium mb-4">Click Statistics</h1>
                    @if(count($chartData))
                        <canvas id="statistics-line" style="width:100%;max-width:100%"></canvas>
                    @else
                        <div class="pt-16 pb-24">
                            <p class="text-lg text-center">No data available</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        @if(count($chartData))
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

            <script>
                const xValues = [];
                const yValues = [];

                @forelse($chartData as $chartDatum)
                xValues.push('{{ $chartDatum->date }}');
                yValues.push('{{ $chartDatum->views }}');
                @empty

                @endforelse

                new Chart("statistics-line", {
                    type: 'line',
                    data: {
                        labels: xValues,
                        datasets: [{
                            label: 'My First Dataset',
                            data: yValues,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {display: false},
                            title: {
                                display: false,
                            },
                        },
                        scales: {
                            y: {
                                ticks: {
                                    callback: function (value, index, ticks) {
                                        if (Math.floor(value) === value) {
                                            return value + ' Views';
                                        }
                                    }
                                }
                            }
                        },
                    }
                })
            </script>
        @endif
    @endpush

</x-cms::_layout.master>
