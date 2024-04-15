{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Lihat informasi profil akun Anda.
        </p>
    </header>

    <div class="mt-6">
        <div class="mb-4">
            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Nama:</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->name }}</p>
        </div>
        <div class="mb-4">
            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Email:</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
        </div>
    </div>

    <button
        class="inline-flex items-center px-4 py-2 bg-custom-button dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-custom-buttonHover dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        onclick="toggleModal('modal-form')">
        Edit
    </button>
</section>

<!-- Edit Profile Modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal-form">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:items-center flex justify-between">
                <h3 class="text-lg font-medium text-gray-900">Ubah informasi akun</h3>
                <button class="text-gray-400 ml-auto sm:ml-0 sm:mt-0 hover:text-gray-500 focus:outline-none"
                    onclick="toggleModal('modal-form')">
                    <i class="ri-close-line text-3xl"></i>
                </button>
            </div>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="mt-2">
                    <form id="edit-form" method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="mt-2">
                            <input id="name" name="name" type="text" required autofocus autocomplete="name"
                                placeholder="Name" value="{{ old('name', $user->name) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required autocomplete="username"
                                placeholder="Email" value="{{ old('email', $user->email) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button form="edit-form" type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    onclick="toggleModal('modal-form')">
                    Cancel
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
</script> --}}

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Perbarui informasi profil dan alamat email akun Anda.') }}
        </p>
    </header>
    <div class="mt-6">
        <div class="mb-4">
            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Nama:</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->name }}</p>
        </div>
        <div class="mb-0">
            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Email:</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
        </div>
    </div>
    <x-primary-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'edit-profile')">{{ __('Edit Profil') }}</x-primary-button>

    <x-modal name="edit-profile" :show="$errors->profileUpdate->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.update') }}" class="p-6">
            @csrf
            @method('patch')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Edit Informasi Profil') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Nama') }}" class="sr-only" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Name') }}" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->profileUpdate->get('name')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="email" value="{{ __('Email') }}" class="sr-only" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-3/4"
                    placeholder="{{ __('Email') }}" :value="old('email', $user->email)" required autocomplete="email" />
                <x-input-error :messages="$errors->profileUpdate->get('email')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Simpan') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
