<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('user.attendance.index') }}"
                class="hover:underline hover:underline-offset-8 hover:decoration-2">
                {{ __('Absen') }}
            </a>
            <span class="mx-2">/</span>
            {{ __('Detail Absen') }}
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
                            <div class="mt-6 space-y-6">
                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div class="w-full">
                                        <x-input-label for="time" :value="__('Pagi')" />
                                        <span class="text-lg">
                                            {{ $attendance->start ?? '-' }}
                                        </span>
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="time" :value="__('Kegiatan Pagi - Siang')" />
                                        <span class="text-lg">
                                            {{ $attendance->start_activity ?? '-' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div class="w-full">
                                        <x-input-label for="time" :value="__('Siang')" />
                                        <span class="text-lg">
                                            {{ $attendance->middle ?? '-' }}
                                        </span>
                                    </div>
                                    <div class="w-full">
                                        <x-input-label for="time" :value="__('Kegiatan Siang - Sore')" />
                                        <span class="text-lg">
                                            {{ $attendance->middle_activity ?? '-' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div class="w-full">
                                        <x-input-label for="time" :value="__('Sore')" />
                                        <span class="text-lg">
                                            {{ $attendance->end ?? '-' }}
                                        </span>
                                    </div>

                                </div>

                                <div class="p-4 rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
                                    <div x-data="image_start('{{ $attendance->img_start ?? '' }}')" class="relative flex flex-col w-full max-w-sm gap-1">

                                        <div>
                                            <x-input-label value="Foto Absen Pagi" />

                                            <img src="{{ asset('storage/' . $attendance->img_start) }}"
                                                class="object-cover mt-2 border border-gray-200 rounded"
                                                style="width: 400px; height: 250px;">
                                            <span class="flex justify-end text-xs text-gray-500">400x250</span>
                                        </div>

                                    </div>


                                    <div x-data="image_end('{{ $attendance->img_end ?? '' }}')" class="relative flex flex-col w-full max-w-sm gap-1">

                                        <div>
                                            <x-input-label value="Foto Absen Sore" />


                                            <img src="{{ asset('storage/' . $attendance->img_end) }}"
                                                class="object-cover mt-2 border border-gray-200 rounded"
                                                style="width: 400px; height: 250px;">
                                            <span class="flex justify-end text-xs text-gray-500">400x250</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
