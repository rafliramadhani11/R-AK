<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Pekerjaan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui data pekerjaan dengan data yang sesuai') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.karyawan.update.job', $user->id_phl) }}"
        class="mt-6 space-y-6 md:grid md:grid-cols-2 md:gap-x-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="position_id" :value="__('Jabatan')" />

            <x-select-input id="position_id" name="position_id" class="block w-full mt-1" required autofocus
                autocomplete="position_id">
                @foreach ($positions as $p)
                    <option value="{{ $p->id }}"
                        {{ old('position_id', $user->position_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->name }}
                    </option>
                @endforeach
            </x-select-input>

            <x-input-error class="mt-2" :messages="$errors->get('position_id')" />
        </div>


        <div>
            <x-input-label for="id_phl" :value="__('ID PHL')" />
            <x-text-input id="id_phl" name="id_phl" type="number" class="block w-full mt-1" :value="old('id_phl', $user->id_phl)"
                required autofocus autocomplete="id_phl" />
            <x-input-error class="mt-2" :messages="$errors->get('id_phl')" />
        </div>

        <div class="col-span-2">
            <x-input-label for="job_place" :value="__('Tempat Kerja')" />
            <x-text-input id="job_place" name="job_place" type="text" class="block w-full mt-1" :value="old('job_place', $user->job_place)"
                required autofocus autocomplete="job_place" />
            <x-input-error class="mt-2" :messages="$errors->get('job_place')" />
        </div>

        {{-- BUTTON SAVE --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'job-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
            @endif
        </div>

    </form>
</section>
