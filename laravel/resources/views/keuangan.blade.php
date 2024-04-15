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
        <div class="py-12 w-full h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Data Keuangan</h2>
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md"
                                onclick="toggleModal('modal-form')">Tambah Data</button>
                        </div>
                        <div class="table-responsive">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Deskripsi
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kategori
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jumlah
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">2024-04-06</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Pengeluaran Biaya Listrik</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Pengeluaran</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Rp 750.000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">2024-04-05</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Pendapatan Penjualan Kopi</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Penjualan</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Rp 3.200.000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">2024-04-04</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Pembelian Bahan Baku</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Pembelian</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Rp 800.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal-form">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:items-center flex justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Tambah Data Keuangan</h3>
                        <button class="text-gray-400 ml-auto sm:ml-0 sm:mt-0 hover:text-gray-500 focus:outline-none"
                            onclick="toggleModal('modal-form')">
                            <i class="ri-close-line text-3xl"></i>
                        </button>
                    </div>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <form action="#" method="POST">
                            <div class="mb-4">
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select id="kategori" name="kategori"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="Pengeluaran">Pengeluaran</option>
                                    <option value="Penjualan">Penjualan</option>
                                    <option value="Pembelian">Pembelian</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="text" name="jumlah" id="jumlah"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </form>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:items-center sm:justify-between">
                        <button type="button"
                            class="inline-flex justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            onclick="toggleModal('modal-form')">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>

        </div>
        <script>
            function toggleModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
            }
        </script>

    </div>
    <footer>
        @include('components.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
