@vite('resources/js/sidebar.js')
<div id="sidebar"
    class="w-64 min-h-screen h-full bg-custom-sidebar p-4 z-50 sidebar-menu transition-transform sm:fixed sm:top-0 sm:left-0">
    <a href="{{ route('features') }}" class="flex items-center justify-center pb-4 border-b border-b-gray-800">
        <span class="text-lg font-bold text-black text-center">{{ strtoupper(Auth::user()->role) }}</span>
    </a>

    <ul class="mt-4">
        @auth
            @if (Auth::user()->role === 'admin')
                <li class="mb-1 group {{ Request::is('admin/akun') ? 'active' : '' }}">
                    <a href="{{ route('akun.index') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class="ri-user-3-line mr-3 text-lg"></i>
                        <span class="text-sm">Akun Karyawan</span>
                    </a>
                </li>
            @else
                <div onclick="alert('Hanya admin yang dapat mengakses')">
                    <li class="mb-1 group {{ Request::is('admin/akun') ? 'active' : '' }}">
                        <a href="{{ url()->current() }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="ri-user-3-line mr-3 text-lg"></i>
                            <span class="text-sm">Akun Karyawan</span>
                        </a>
                    </li>
                </div>
            @endif
        @endauth
        <li class="mb-1 group {{ Request::is('jadwal') ? 'active' : '' }}">
            <a href="{{ route('jadwal') }}"
                class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-calendar-line mr-3 text-lg"></i>
                <span class="text-sm">Jadwal Kerja</span>
            </a>
        </li>
        {{-- <li class="mb-1 group">
            <a href="#"
                class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class="ri-calendar-line mr-3 text-lg"></i>
                <span class="text-sm">Jadwal Kerja</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4">
                    <a href="#"
                        class="text-black text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-blacktext-black before:mr-3">Active
                        order</a>
                </li>
                <li class="mb-4">
                    <a href="#"
                        class="text-black text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-blacktext-black before:mr-3">Completed
                        order</a>
                </li>
                <li class="mb-4">
                    <a href="#"
                        class="text-black text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-blacktext-black before:mr-3">Canceled
                        order</a>
                </li>
            </ul>
        </li> --}}
        <li class="mb-1 group {{ Request::is('admin/keuangan') ? 'active' : '' }}">
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.keuangan') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class="ri-money-dollar-box-line mr-3 text-lg"></i>
                        <span class="text-sm">Data Keuangan</span>
                    </a>
                @else
                    <div onclick="alert('Hanya admin yang dapat mengakses')">
                        <a href="{{ url()->current() }}"
                            class="flex items-center py-2 px-4 text-black cursor-not-allowed hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="ri-money-dollar-box-line mr-3 text-lg"></i>
                            <span class="text-sm">Data Keuangan</span>
                        </a>
                    </div>
                @endif
            @endauth
        </li>
        <li class="mb-1 group {{ Request::is('admin/pendapatan') ? 'active' : '' }}">
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.pendapatan') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class="ri-line-chart-line mr-3 text-lg"></i>
                        <span class="text-sm">Analisis Pendapatan</span>
                    </a>
                @else
                    <div onclick="alert('Hanya admin yang dapat mengakses')">
                        <a href="{{ url()->current() }}"
                            class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                            <i class="ri-line-chart-line mr-3 text-lg"></i>
                            <span class="text-sm">Analisis Pendapatan</span>
                        </a>
                    </div>
                @endif
            @endauth
        </li>

        <li class="mb-1 group {{ Request::is('prediksi') ? 'active' : '' }}">
            <a href={{ route('prediksi') }}
                class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-seedling-line mr-3 text-lg"></i>
                <span class="text-sm">Prediksi Harga kopi</span>
            </a>
        </li>
        <li class="mb-1 group {{ Request::is('cuaca') ? 'active' : '' }}">
            <a href={{ route('cuaca') }}
                class="flex items-center py-2 px-4 text-black hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-sun-cloudy-line mr-3 text-lg"></i>
                <span class="text-sm">Prediksi Cuaca</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 md:hidden sidebar-overlay" id="sidebar-overlay"></div>
