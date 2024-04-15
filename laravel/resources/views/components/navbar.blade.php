<style>
    .active_link {
        text-decoration: underline;
        font-weight: bold;
    }
</style>
{{-- <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 relative"> --}}
<nav x-data="{ open: false }"
    class="w-full bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 relative z-50">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 bg-custom-navbar">
        <div class="flex justify-between items-center px-6 py-4 relative">
            <div class="flex items-center z-50">
                <img src="{{ asset('images/logo2.png') }}" alt="logo">
                <a href="/" class="text-lg font-bold text-gray-800 dark:text-white">ekap Kopi</a>
                <div class="flex justify-center items-center">
                    <button type="button" class="text-lg text-gray-600 sidebar-toggle ml-4">
                        <i class="ri-menu-line"></i>
                    </button>
                </div>
            </div>

            {{-- <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:flex space-x-4 items-center"> --}}
            <div class="hidden sm:flex space-x-4 items-center">
                <a href="{{ route('welcome') }}"
                    class="text-black dark:text-gray-400 hover:text-gray-800 dark:hover:text-white {{ Request::is('/') ? 'active_link' : '' }}">Beranda</a>
                <a href="{{ route('features') }}"
                    class="text-black dark:text-gray-400 hover:text-gray-800 dark:hover:text-white {{ Request::is(['admin/dashboard', 'karyawan/dashboard', 'admin/akun', 'jadwal', 'admin/keuangan', 'admin/pendapatan', 'prediksi', 'cuaca']) ? 'active_link' : '' }}">Fitur-Fitur</a>
                <a href="{{ route('about') }}"
                    class="text-black dark:text-gray-400 hover:text-gray-800 dark:hover:text-white {{ Request::is('tentang') ? 'active_link' : '' }}">Tentang
                    Kami</a>
            </div>

            <div class="flex space-x-4 items-center">
                @if (Route::has('login'))
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-transparent dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link>
                                        <div class="font-bold">
                                            {{ Auth::user()->name }}
                                        </div>
                                        <div>
                                            {{ Auth::user()->role }}
                                        </div>
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Akun Saya') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <div class="hidden sm:flex space-x-2 items-center">
                            <a href="{{ route('login') }}"
                                class="text-black dark:text-gray-400 hover:text-gray-800 dark:hover:text-white">Masuk</a>
                            <span class="text-black dark:text-gray-600">|</span>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-white bg-custom-button hover:bg-custom-buttonHover dark:text-gray-400 hover:text-gray-800 dark:hover:text-white px-4 py-1 rounded-lg">Daftar</a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>

            <div class="sm:hidden">
                <button @click="open = !open" type="button"
                    class="text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden absolute top-16 right-0 bg-white dark:bg-gray-800 w-48 mt-2 py-2 rounded-md shadow-lg">
        @if (Route::has('login'))
            @auth
                <div class="px-4 mb-1">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            @endauth
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            @auth
                @if (Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Fitur-fitur') }}
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'karyawan')
                    <x-responsive-nav-link :href="route('karyawan.dashboard')" :active="request()->routeIs('karyawan.dashboard')">
                        {{ __('Fitur-fitur') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('Tentang Kami') }}
            </x-responsive-nav-link>


            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600 grid">

                @auth
                    {{-- <div class="px-4">
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div> --}}
                @else
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Masuk') }}
                    </x-responsive-nav-link>

                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('Daftar') }}
                        </x-responsive-nav-link>
                    @endif
                @endauth
        @endif

        @if (Route::has('login'))
            @auth
                <div class="mt-1 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endif
            @endif
        </div>
        </div>
    </nav>
