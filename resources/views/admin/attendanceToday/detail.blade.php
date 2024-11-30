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
                <div class="max-w-full">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Informasi Absen Hari Ini') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Gunakan AM untuk 00 - 12, PM untuk 12 - 00') }}
                            </p>
                        </header>
                        @if ($attendance->izin_status === 1)
                            <div
                                class="relative w-full p-4 mt-6 bg-white border border-yellow-400 rounded-lg text-slate-900">
                                <h5 class="mb-1 text-sm font-medium leading-none tracking-tight">Alasan Izin</h5>
                                <div class="text-lg tracking-wide">
                                    {{ $attendance->alasan_izin }}
                                </div>
                            </div>
                        @else
                            <form method="post" action="{{ route('admin.absenToday.update', $attendance->id) }}"
                                class="mt-6 space-y-6">
                                @csrf
                                @method('patch')

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div class="w-full">
                                        <x-input-label for="time" :value="__('Pagi')" />
                                        <x-text-input id="time" name="start" type="time" step='any'
                                            class="block w-full mt-1" :value="old('start', $attendance->start)" required autofocus
                                            autocomplete="start" />

                                        <x-input-error class="mt-2" :messages="$errors->get('start')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="start_activity" :value="__('Kegiatan Pagi - Siang')" />
                                        <x-text-input id="start_activity" name="start_activity" type="text"
                                            class="block w-full mt-1" :value="old('start_activity', $attendance->start_activity)" required autofocus
                                            autocomplete="start_activity" />

                                        <x-input-error class="mt-2" :messages="$errors->get('start_activity')" />
                                    </div>
                                </div>

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div class="w-full">
                                        <x-input-label for="middle" :value="__('Siang')" />
                                        <x-text-input id="middle" name="middle" type="time" step='any'
                                            class="block w-full mt-1" :value="old('middle', $attendance->middle)" required autofocus
                                            autocomplete="middle" />

                                        <x-input-error class="mt-2" :messages="$errors->get('start')" />
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="middle_activity" :value="__('Kegiatan Siang - Sore')" />
                                        <x-text-input id="middle_activity" name="middle_activity" type="text"
                                            class="block w-full mt-1" :value="old('middle_activity', $attendance->middle_activity)" required autofocus
                                            autocomplete="middle_activity" />

                                        <x-input-error class="mt-2" :messages="$errors->get('middle_activity')" />
                                    </div>
                                </div>

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div class="w-1/2">
                                        <x-input-label for="end" :value="__('Sore')" />
                                        <x-text-input id="end" name="end" type="time" step='any'
                                            class="block w-full mt-1" :value="old('end', $attendance->end)" required autofocus
                                            autocomplete="end" />
                                        <x-input-error class="mt-2" :messages="$errors->get('end')" />
                                    </div>
                                </div>

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div x-data="image_start('{{ $attendance->img_start ?? '' }}')" class="relative flex flex-col w-full max-w-sm gap-1">

                                        <div>
                                            <x-input-label value="Foto Absen Pagi" />


                                            <img src="{{ asset('storage/img/img_start/' . $attendance->img_start) }}"
                                                class="object-cover mt-2 border border-gray-200 rounded"
                                                style="width: 400px; height: 250px;">
                                            <span class="flex justify-end text-xs text-gray-500">400x250</span>
                                        </div>

                                    </div>


                                    <div x-data="image_end('{{ $attendance->img_end ?? '' }}')" class="relative flex flex-col w-full max-w-sm gap-1">

                                        <div>
                                            <x-input-label value="Foto Absen Sore" />

                                            <img src="{{ asset('storage/img/img_end/' . $attendance->img_end) }}"
                                                class="object-cover mt-2 border border-gray-200 rounded"
                                                style="width: 400px; height: 250px;">
                                            <span class="flex justify-end text-xs text-gray-500">400x250</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>

                                    @if (session('status') === 'absen-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
                                    @endif
                                </div>

                            </form>
                        @endif

                    </section>

                </div>
            </div>
        </div>
    </div>

    <script>
        function image_start(defaultImage = '') {

            return {
                imageUrl: defaultImage || '',

                fileChosen(event) {
                    this.fileToDataUrl(event, (src) => (this.imageUrl = src));
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return;

                    let file = event.target.files[0],
                        reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = (e) => callback(e.target.result);
                },
            };
        }

        function image_end(defaultImage = '') {

            return {
                imageUrl: defaultImage || '',

                fileChosen(event) {
                    this.fileToDataUrl(event, (src) => (this.imageUrl = src));
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return;

                    let file = event.target.files[0],
                        reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = (e) => callback(e.target.result);
                },
            };
        }
    </script>


</x-app-layout>
