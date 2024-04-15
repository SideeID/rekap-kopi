<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Pa-Pi') }}</title>

    <link rel="icon" href={{ asset('images/icon.ico') }} type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <header>
        @include('components.navbar')
    </header>
    <div class="flex">
        <div class="sidebar">
            @include('components.sidebar')
        </div>
        <div
            class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2 w-full h-full">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium">Analisis Pendapatan</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div class="rounded-md border border-dashed border-gray-600 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">10</div>
                        <span
                            class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">Rp
                            749.000</span>
                    </div>
                    <span class="text-gray-400 text-sm">Aktif</span>
                </div>
                <div class="rounded-md border border-dashed border-gray-600 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">50</div>
                        <span
                            class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+Rp
                            469.000</span>
                    </div>
                    <span class="text-gray-400 text-sm">Selesai</span>
                </div>
                <div class="rounded-md border border-dashed border-gray-600 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">4</div>
                        <span
                            class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-Rp
                            130.000</span>
                    </div>
                    <span class="text-gray-400 text-sm">Dibatalkan</span>
                </div>
            </div>
            <div>
                <canvas id="order-chart"></canvas>
            </div>
        </div>
    </div>
    <footer>
        @include('components.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
