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

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full h-screen">
            <form>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:items-center">
                    <div class="flex-grow">
                        <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi"
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cek</button>
                </div>
            </form>

            <div class="mt-8">
                <h2 class="text-lg font-semibold text-gray-800">Hasil Prediksi</h2>
                <div class="mt-4">
                    <div class="bg-gray-50 p-4 rounded-md shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Lokasi:</p>
                                <p class="text-lg font-semibold text-gray-800">Jember, Indonesia</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600">Cuaca:</p>
                                <p class="text-lg font-semibold text-gray-800">Cerah</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm font-medium text-gray-600">Temperatur:</p>
                            <p class="text-lg font-semibold text-gray-800">30°C</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <footer>
        @include('components.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
