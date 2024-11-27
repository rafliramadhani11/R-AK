<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Kontrak') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui data kontrak karyawan dengan data yang benar') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.karyawan.update.contract', $contract->id) }}"
        class="mt-6 space-y-6 md:grid md:grid-cols-2 md:gap-x-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="no_contract" :value="__('No. Kontrak')" />
            <x-text-input id="no_contract" name="no_contract" type="text" class="block w-full mt-1" :value="old('no_contract', $contract->no_contract)"
                required autofocus autocomplete="no_contract" />
            <x-input-error class="mt-2" :messages="$errors->get('no_contract')" />
        </div>

        <div>
            <x-input-label for="start_contract" :value="__('Mulai Kontrak')" />
            <x-text-input id="start_contract" name="start_contract" type="date" class="block w-full mt-1"
                :value="old('start_contract', $contract->start_contract)" required autofocus autocomplete="start_contract" />
            <x-input-error class="mt-2" :messages="$errors->get('start_contract')" />
        </div>

        <div>
            <x-input-label for="end_contract" :value="__('Habis Kontrak')" />
            <x-text-input id="end_contract" name="end_contract" type="date" class="block w-full mt-1"
                :value="old('end_contract', $contract->end_contract)" required autofocus autocomplete="end_contract" />
            <x-input-error class="mt-2" :messages="$errors->get('end_contract')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <x-select-input id="status" name="status" class="block w-full mt-1" :value="old('status', $contract->status)" required
                autofocus autocomplete="status">
                <option value="Berjalan" {{ $contract->status === 'Berjalan' ? 'selected' : '' }}>
                    Berjalan
                </option>
                <option value="Tidak Berjalan" {{ $contract->status === 'Tidak Berjalan' ? 'selected' : '' }}>
                    Tidak Berjalan
                </option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div class="col-span-2">
            <x-input-label for="salary" :value="__('Gaji')" />
            <x-text-input id="salary" name="salary" type="number" step="any" class="block w-full mt-1"
                :value="old('salary', $contract->salary)" required autofocus autocomplete="salary" />
            <x-input-error class="mt-2" :messages="$errors->get('salary')" />
        </div>

        {{-- BUTTON SAVE --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'contract-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
            @endif
        </div>

    </form>
</section>
