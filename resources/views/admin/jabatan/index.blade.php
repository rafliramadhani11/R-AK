<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jabatan') }}
        </h2>
    </x-slot>

    <div class="py-6 space-y-3">

        <div x-data="{ createJabatan: false }" class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-end px-6 overflow-hidden ">

                <a href="#" @click.prevent="createJabatan = true"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Buat Jabatan Baru
                </a>

                <div x-cloak x-show="createJabatan" class="relative z-10" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">

                    <div class="fixed inset-0 transition-opacity bg-gray-500/75" aria-hidden="true"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

                            <form method="post" action="{{ route('admin.jabatan.store') }}"
                                class="relative w-full px-6 py-4 space-y-5 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-lg">
                                @csrf
                                <div>
                                    <h2 class="text-base font-semibold text-gray-900">
                                        Buat Jabatan Baru
                                    </h2>
                                </div>
                                <div class="">
                                    <x-input-label for="name" value="Nama Jabatan" />
                                    <x-text-input id="name" name="name" class="block w-full px-3 py-1 mt-1" />
                                </div>
                                <div class="flex items-center justify-end gap-x-3">
                                    <x-secondary-button @click="createJabatan = false">
                                        Tidak
                                    </x-secondary-button>
                                    <x-primary-button type="submit">
                                        Buat
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div>

                @if (session('status') === 'jabatan-created')
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                        class="relative flex items-center w-full px-3 py-2 text-green-500 bg-green-100 border border-transparent rounded-md">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h5 class="font-medium leading-none tracking-wide uppercase">
                            Jabatan baru berhasil di tambahkan
                        </h5>
                    </div>
                @endif

                @if (session('status') === 'jabatan-deleted')
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                        class="relative flex items-center w-full px-3 py-2 text-green-500 bg-green-100 border border-transparent rounded-md">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h5 class="font-medium leading-none tracking-wide uppercase">
                            Jabatan berhasil di hapus
                        </h5>
                    </div>
                @endif

                <livewire:table-jabatan />
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
