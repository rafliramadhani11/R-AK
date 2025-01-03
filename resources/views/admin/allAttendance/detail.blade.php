<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('admin.absenMonth.index') }}"
                class="hover:underline hover:underline-offset-8 hover:decoration-2">
                {{ __('Absen Bulanan') }}
            </a>
            <span class="mx-2">/</span>
            {{ __('Detail Absen ' . Carbon\Carbon::createFromFormat('Y-m', $month)->translatedFormat('F Y')) }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-3">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="w-full max-w-xs min-w-[200px]">
                    <livewire:search-user-attendance />
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <livewire:all-month-detail-table :month="$month" />
            </div>
        </div>

    </div>
</x-app-layout>
