<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Absen Siang') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Gunakan AM untuk 00 PAGI - 12 SIANG, PM untuk 12 SIANG - 00 MALAM') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.absen-siang.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="rounded sm:flex sm:items-center sm:justify-between sm:gap-x-5">
            <div class="w-full">
                <x-input-label for="time" :value="__('Jam')" />
                <x-text-input id="time" name="middle" type="time" step='any' class="block w-full mt-1"
                    :value="old('middle')" required autofocus autocomplete="middle" />

                <x-input-error class="mt-2" :messages="$errors->get('middle')" />
            </div>
            <div class="w-full">
                <x-input-label for="middle_activity" :value="__('Kegiatan')" />
                <x-text-input id="middle_activity" name="middle_activity" type="text" class="block w-full mt-1"
                    :value="old('middle_activity')" required autofocus autocomplete="middle_activity" />

                <x-input-error class="mt-2" :messages="$errors->get('middle_activity')" />
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
</section>
