<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Absen Hari ini') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-3">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="flex flex-col text-gray-900">
                    <span class="text-xl font-bold">{{ now()->translatedFormat('l') }}</span>
                    <span class="text-sm text-slate-500">{{ now()->translatedFormat('j F Y') }}</span>
                </div>

                {{-- <a href="{{ route('user.attendance.create') }}" wire:navigate
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Lakukan Absen
                </a> --}}

            </div>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <livewire:user.table-attendance-today>
            </div>
        </div>

    </div>
</x-app-layout>
