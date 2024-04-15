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
        <div class="flex items-start justify-center w-full my-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 w-full mx-4">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1">10</div>
                            <div class="text-sm font-medium text-gray-400">Total Akun</div>
                        </div>
                    </div>
                    <a href={{ route('akun.index') }} class="text-blue-500 font-medium text-sm hover:text-blue-600">View details</a>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">324</div>
                                <div
                                    class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">
                                    +30%</div>
                            </div>
                            <div class="text-sm font-medium text-gray-400">Total Penjualan</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1"><span
                                    class="text-base font-normal text-gray-400 align-top">Rp.</span>2,345</div>
                            <div class="text-sm font-medium text-gray-400">Harga Kopi Terkini</div>
                        </div>
                    </div>
                    <a href={{ route('prediksi') }} class="text-blue-500 font-medium text-sm hover:text-blue-600">View details</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        @include('components.footer')
    </footer>
</body>

</html>
