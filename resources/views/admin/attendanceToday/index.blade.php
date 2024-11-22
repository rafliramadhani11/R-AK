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
                <div class=" w-full max-w-xs min-w-[200px]">
                    <livewire:search-user-attendance />
                </div>

            </div>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <livewire:absensi-today />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
