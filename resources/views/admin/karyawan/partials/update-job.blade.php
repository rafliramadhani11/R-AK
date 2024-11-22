<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Pekerjaan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui data pekerjaan dengan data yang sesuai') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.karyawan.update.job', $activity->id) }}"
        class="mt-6 space-y-6 md:grid md:grid-cols-2 md:gap-x-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="jabatan" :value="__('Jabatan')" />
            <x-text-input id="jabatan" name="jabatan" type="text" class="block w-full mt-1" :value="old('jabatan', $activity->position->name)" required
                autofocus autocomplete="jabatan" />
            <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
        </div>

        <div>
            <x-input-label for="kegiatan" :value="__('Kegiatan')" />
            <x-text-input id="kegiatan" name="kegiatan" type="text" class="block w-full mt-1" :value="old('kegiatan', $activity->activity_name)"
                required autofocus autocomplete="kegiatan" />
            <x-input-error class="mt-2" :messages="$errors->get('kegiatan')" />
        </div>

        <div>
            <x-input-label for="sub_kegiatan" :value="__('Sub Kegiatan')" />
            <x-text-input id="sub_kegiatan" name="sub_kegiatan" type="text" class="block w-full mt-1"
                :value="old('sub_kegiatan', $activity->sub_activity)" required autofocus autocomplete="sub_kegiatan" />
            <x-input-error class="mt-2" :messages="$errors->get('sub_kegiatan')" />
        </div>

        <div>
            <x-input-label for="pask" :value="__('Pask')" />
            <x-text-input id="pask" name="pask" type="text" class="block w-full mt-1" :value="old('pask', $activity->task)"
                required autofocus autocomplete="pask" />
            <x-input-error class="mt-2" :messages="$errors->get('pask')" />
        </div>

        {{-- BUTTON SAVE --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'job-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
            @endif
        </div>

    </form>
</section>
