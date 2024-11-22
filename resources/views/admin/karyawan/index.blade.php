<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Absen Bulanan') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-3">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <livewire:table-karyawan />
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
