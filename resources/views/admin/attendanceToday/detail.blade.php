<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('admin.absenToday.index') }}" wire:navigate
                class="hover:underline hover:underline-offset-8 hover:decoration-2">
                {{ __('Absen') }}
            </a>
            <span class="mx-2">/</span>
            {{ __('Detail Absen ' . $attendance->user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Informasi Absen Hari Ini') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Gunakan AM untuk 00 - 12, PM untuk 12 - 00') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.absenToday.update', $attendance->id) }}"
                            class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="time" :value="__('Start')" />
                                <x-text-input id="time" name="start" type="time" step='any'
                                    class="block w-full mt-1" :value="old('start', $attendance->start)" required autofocus
                                    autocomplete="start" />

                                <x-input-error class="mt-2" :messages="$errors->get('start')" />
                            </div>

                            <div>
                                <x-input-label for="middle" :value="__('Middle')" />
                                <x-text-input id="middle" name="middle" type="time" step='any'
                                    class="block w-full mt-1" :value="old('middle', $attendance->middle)" required autocomplete="middle" />
                                <x-input-error class="mt-2" :messages="$errors->get('middle')" />
                            </div>

                            <div>
                                <x-input-label for="end" :value="__('End')" />
                                <x-text-input id="end" name="end" type="time" step='any'
                                    class="block w-full mt-1" :value="old('end', $attendance->end)" required autocomplete="end" />
                                <x-input-error class="mt-2" :messages="$errors->get('end')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Simpan') }}</x-primary-button>

                                @if (session('status') === 'absen-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
