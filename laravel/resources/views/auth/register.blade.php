<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <div class="mt-1 text-start font-bold text-xl text-black dark:text-white">
                {{ __('Selamat Datang!') }}
            </div>
            <div class="mt-1 mb-0 text-start font-bold text-xl text-black dark:text-white">
                {{ __('Daftarkan Akunmu!') }}
            </div>
            <div class="mt-0">
                {{__('Buat akun sesuai dengan ketentuan')}}
            </div>
            <hr class="border-b border-black my-4">

            <x-input-label for="name" :value="__('Nama Pengguna')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <!-- Email Address -->
            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Confirm Password -->
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <!-- Register Button -->
            <div class="flex justify-center">
                <x-primary-button class="w-full mt-4 flex items-center justify-center">
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>

            <!-- Additional Links -->
            <div class="flex justify-between items-center">
                <a href="{{ route('login') }}" class="text-sm text-black dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Sudah punya akun? Masuk disini!') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
