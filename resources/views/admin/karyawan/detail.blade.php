<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('admin.karyawan.index') }}" wire:navigate
                class="hover:underline hover:underline-offset-8 hover:decoration-2">
                {{ __('Karyawan') }}
            </a>
            <span class="mx-2">/</span>
            {{ __('Detail Karyawan ' . $user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">

            <div class="px-8 py-5 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl md:max-w-full">
                    @include('admin.karyawan.partials.update-profile')
                </div>
            </div>

            <div class="px-8 py-5 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl md:max-w-full">
                    @include('admin.karyawan.partials.update-job')
                </div>
            </div>


            <div class="px-8 py-5 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl md:max-w-full">
                    @include('admin.karyawan.partials.update-contract')
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
