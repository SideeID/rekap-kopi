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
            <div class="bg-white p-6 rounded-lg shadow-md">

                <form action="/upload" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            Pilih File Gambar
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" name="image" type="file" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Prediksi
                        </button>
                    </div>
                </form>

                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800">Hasil Prediksi</h2>
                    <div class="mt-4">
                        <div class="bg-gray-50 p-4 rounded-md shadow-md flex items-center justify-between">
                            <!-- Menampilkan hasil prediksi di sini -->
                            @isset($prediction)
                                <p class="text-gray-700">Prediksi: {{ $prediction }}</p>
                            @endisset
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
