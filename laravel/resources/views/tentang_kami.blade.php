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
            <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Tentang Rekap Kopi</h1>
            <p class="text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec suscipit ipsum, vel placerat nulla.
                Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                turpis egestas. Cras fringilla justo et ex scelerisque, in faucibus nunc condimentum. Fusce in dignissim
                eros. Nulla facilisi. Nulla facilisi. Aliquam id magna eget felis auctor pretium. Sed id cursus nulla,
                et dictum libero. Maecenas faucibus lectus eget enim suscipit, sit amet lobortis quam commodo.
            </p>
            <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Tentang IzzaCoffee</h1>
            <p class="text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec suscipit ipsum, vel placerat nulla.
                Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                turpis egestas. Cras fringilla justo et ex scelerisque, in faucibus nunc condimentum. Fusce in dignissim
                eros. Nulla facilisi. Nulla facilisi. Aliquam id magna eget felis auctor pretium. Sed id cursus nulla,
                et dictum libero. Maecenas faucibus lectus eget enim suscipit, sit amet lobortis quam commodo.
            </p>
        </div>
    </main>

    <footer>
        @include('components.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
