<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Absen Pagi') }}
        </h2>
        {{--
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Gunakan AM untuk 00 PAGI - 12 SIANG, PM untuk 12 SIANG - 00 MALAM') }}
        </p> --}}
    </header>

    <form method="post" action="{{ route('user.absen-pagi.store') }}" class="mt-6 space-y-6">
        @csrf

        <div class="space-y-5 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-5">

            <div class="w-full">
                <x-input-label for="time" :value="__('Jam')" />
                <x-text-input id="time" name="start" type="time" step='any' class="block w-full mt-1"
                    :value="old('start', now()->format('H:i'))" required autofocus autocomplete="start" />

                <x-input-error class="mt-2" :messages="$errors->get('start')" />
            </div>

            <div class="w-full">
                <x-input-label for="start_activity" :value="__('Kegiatan Pagi - Siang')" />
                <x-text-input id="start_activity" name="start_activity" type="text" class="block w-full mt-1"
                    :value="old('start_activity')" required autofocus autocomplete="start_activity" />

                <x-input-error class="mt-2" :messages="$errors->get('start_activity')" />
            </div>

            <div class="w-full ">
                <p id="start-camera" class="inline-block text-sm font-semibold underline cursor-pointer">
                    Buka Kamera</p>
                <video id="video" width="320" height="240" autoplay class="w-full mt-2 rounded"></video>

                <div id="click-photo" class="inline-block mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="cursor-pointer size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </div>
            </div>

            <div class="w-full">
                <p id="start-camera" class="inline-block text-sm font-medium text-gray-700">
                    Foto Absen Pagi</p>
                <x-input-error class="mt-2" :messages="$errors->get('img_start')" />
                <canvas id="canvas" width="320" height="240" class="w-full mt-2 rounded"></canvas>
            </div>

            <!-- Input Hidden untuk Menyimpan Data URL Gambar -->
            <input type="hidden" id="img_start" name="img_start">



        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'absen-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
            @endif
        </div>

    </form>
    {{-- <livewire:admin.absen-pagi.create /> --}}

    <script>
        let camera_button = document.querySelector("#start-camera");
        let video = document.querySelector("#video");
        let click_button = document.querySelector("#click-photo");
        let canvas = document.querySelector("#canvas");
        let imgStartInput = document.querySelector("#img_start");

        camera_button.addEventListener('click', async function() {
            let stream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            });
            video.srcObject = stream;
        });

        click_button.addEventListener('click', function() {
            // Mengambil gambar dari video dan menggambar ke canvas
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

            // Mengubah canvas menjadi data URL gambar
            let image_data_url = canvas.toDataURL('image/jpeg');

            // Menyimpan data URL ke dalam input hidden
            imgStartInput.value = image_data_url;

        });
    </script>
</section>
