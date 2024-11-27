<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-3">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="w-full max-w-xs min-w-[200px]">
                    <livewire:search-user-attendance />
                </div>


                <a href="{{ route('admin.karyawan.create') }}"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Buat Karyawan Baru
                </a>
            </div>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    @if (session('status') === 'karyawan-deleted')
                        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                            class="relative flex items-center w-full px-3 py-2 text-green-500 bg-green-100 border border-transparent rounded-md">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h5 class="font-medium leading-none tracking-wide uppercase">
                                Berhasil menghapus karyawan
                            </h5>
                        </div>
                    @endif

                    @if (session('status') === 'karyawan-created')
                        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                            class="relative flex items-center w-full px-3 py-2 text-green-500 bg-green-100 border border-transparent rounded-md">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h5 class="font-medium leading-none tracking-wide uppercase">
                                Karyawan baru berhasil di tambahkan
                            </h5>
                        </div>
                    @endif

                    <livewire:table-karyawan />
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
