<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Pa-Pi') }}</title>

    <link rel="icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <header>
        @include('components.navbar')
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg flex flex-col flex-grow gap-6">
            <div class="flex flex-col sm:flex-row justify-center items-center mt-2">
                <div class="text-left mb-5 sm:w-1/2 sm:mr-5">
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Selamat Datang di Ra-Pi</h1>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ipsa, aliquid quisquam delectus explicabo commodi eius voluptatem
                        perspiciatis aliquam aspernatur, eligendi consequuntur ut mollitia sequi asperiores quo
                        corporis amet. Tempore, vel!</p>
                    <button
                        class="bg-custom-button hover:bg-custom-buttonHover text-white font-bold py-2 px-4 rounded-lg mt-4">
                        <a href="{{ route('about') }}">Tentang Kami</a>
                    </button>
                </div>
                <div class="circle-shape"></div>
                <img src="{{ asset('images/1.png') }}" alt="Gambar Barista" class="w-full sm:w-1/3 ">

            </div>

            <div class="flex flex-col sm:flex-row justify-center items-center my-8">
                <img src="{{ asset('images/2.png') }}" alt="Gambar Barista" class="w-full sm:w-1/3 sm:mr-5">
                <div class="text-left sm:w-1/2">
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Produksi Kopi</h1>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ipsa, aliquid quisquam delectus explicabo commodi eius voluptatem
                        perspiciatis aliquam aspernatur, eligendi consequuntur ut mollitia sequi asperiores quo
                        corporis amet. Tempore, vel!</p>
                    <button
                        class="bg-custom-button hover:bg-custom-buttonHover text-white font-bold py-2 px-4 rounded-lg mt-4">
                        <a href="{{ route('login') }}">Fitur-Fitur</a>
                    </button>
                </div>
            </div>
        </div>
    </main>
    <footer>
        @include('components.footer')
    </footer>
</body>

</html>
