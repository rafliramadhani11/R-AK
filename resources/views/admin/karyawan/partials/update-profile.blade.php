<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Karyawan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui data karyawan dengan data yang akurat') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.karyawan.update.profile', $user->id_phl) }}"
        class="mt-6 space-y-6 md:grid md:grid-cols-2 md:gap-x-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama Karyawan')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)"
                required autofocus autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            <x-select-input id="gender" name="gender" class="block w-full mt-1" :value="old('gender', $user->gender)" required autofocus
                autocomplete="gender">
                <option value="Laki - Laki" {{ $user->gender === 'Laki - Laki' ? 'selected' : '' }}>
                    Laki - Laki
                </option>
                <option value="Perempuan" {{ $user->gender === 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="number" class="block w-full mt-1" :value="old('phone', $user->phone)"
                required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        {{-- <div>
            <x-input-label for="id_phl" :value="__('ID PHL')" />
            <x-text-input id="id_phl" name="id_phl" type="number" class="block w-full mt-1" :value="old('id_phl', $user->id_phl)"
                required autofocus autocomplete="id_phl" />
            <x-input-error class="mt-2" :messages="$errors->get('id_phl')" />
        </div>

        <div>
            <x-input-label for="job_place" :value="__('Tempat Kerja')" />
            <x-text-input id="job_place" name="job_place" type="text" class="block w-full mt-1" :value="old('job_place', $user->job_place)"
                required autofocus autocomplete="job_place" />
            <x-input-error class="mt-2" :messages="$errors->get('job_place')" />
        </div> --}}

        <div class="md:col-span-2">
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $user->address)"
                required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        {{-- BUTTON SAVE --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
            @endif
        </div>

    </form>
</section>
