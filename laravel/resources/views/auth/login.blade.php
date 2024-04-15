<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="space-y-4">
            <div class="mt-1 text-start font-bold text-xl text-black dark:text-white">
                {{ __('Selamat Datang!') }}
            </div>
            <div class="mt-1 text-start font-bold text-xl text-black dark:text-white">
                {{ __('Masuk ke Akun') }}
            </div>
            <div>
                {{__('Masuk ke akun yang sudah terdaftar')}}
            </div>
            <hr class="border-b border-black my-4">

            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-black dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Log in Button -->
            <div class="flex justify-center">
                <x-primary-button class="w-full mt-4 flex items-center justify-center">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>

            <!-- Additional Links -->
            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-black dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <a href="{{ route('register') }}" class="text-sm text-black dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Belum punya akun? Daftar disini!') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
