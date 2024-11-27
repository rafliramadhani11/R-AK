<section>


    <form method="post" action="{{ route('admin.karyawan.store') }}" class="space-y-6 md:grid md:grid-cols-2 md:gap-x-6">
        @csrf

        {{-- AKUN KARYAWAN --}}
        <header class="md:col-span-2">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Akun Karyawan') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Buat Akun dengan email dan password yang mudah di ingat') }}
            </p>
        </header>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email')" required
                autofocus autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="block w-full mt-1" :value="old('password')"
                required autofocus autocomplete="password" />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="block w-full mt-1" :value="old('password_confirmation')" required autofocus autocomplete="password_confirmation" />
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>

        {{-- PROFILE KARYAWAN --}}
        <header class="md:col-span-2">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Profile Karyawan') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Buat data karyawan dengan data diri yang sesuai') }}
            </p>
        </header>

        <div>
            <x-input-label for="name" :value="__('Nama Karyawan')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            <x-select-input id="gender" name="gender" class="block w-full mt-1" :value="old('gender')" required
                autofocus autocomplete="gender">
                <option selected disabled></option>
                <option value="Laki - Laki" {{ old('gender') === 'Laki - Laki' ? 'selected' : '' }}>
                    Laki - Laki
                </option>
                <option value="Perempuan" {{ old('gender') === 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('No Handphone')" />
            <x-text-input id="phone" name="phone" type="number" class="block w-full mt-1" :value="old('phone')"
                required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address')"
                required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="position_id" :value="__('Jabatan')" />
            <x-select-input id="position_id" name="position_id" class="block w-full mt-1" :value="old('position_id')" required
                autofocus autocomplete="position_id">
                <option selected disabled></option>
                @foreach ($positions as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </x-select-input>
            <a href="{{ route('admin.jabatan.index') }}" wire:navigate
                class="text-xs font-semibold tracking-wide text-gray-500 underline">
                Buat Jabatan baru di sini
            </a>
            <x-input-error class="mt-2" :messages="$errors->get('position_id')" />
        </div>

        <div>
            <x-input-label for="job_place" :value="__('Lokasi Kerja')" />
            <x-text-input id="job_place" name="job_place" type="text" class="block w-full mt-1" :value="old('job_place')"
                required autofocus autocomplete="job_place" />
            <x-input-error class="mt-2" :messages="$errors->get('job_place')" />
        </div>

        <div class="col-span-2">
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address')"
                required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        {{-- CONTRACT --}}
        <header class="mt-6 md:col-span-2">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Data Kontrak') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Buat data kontrak dengan baik dan benar') }}
            </p>
        </header>

        <div>
            <x-input-label for="no_contract" :value="__('No. Kontrak')" />
            <x-text-input id="no_contract" name="no_contract" type="number" class="block w-full mt-1"
                :value="old('no_contract')" required autofocus autocomplete="no_contract" />
            <x-input-error class="mt-2" :messages="$errors->get('no_contract')" />
        </div>

        <div>
            <x-input-label for="start_contract" :value="__('Mulai Kontrak')" />
            <x-text-input id="start_contract" name="start_contract" type="date" class="block w-full mt-1"
                :value="old('start_contract')" required autofocus autocomplete="start_contract" />
            <x-input-error class="mt-2" :messages="$errors->get('start_contract')" />
        </div>

        <div>
            <x-input-label for="end_contract" :value="__('Habis Kontrak')" />
            <x-text-input id="end_contract" name="end_contract" type="date" class="block w-full mt-1"
                :value="old('end_contract')" required autofocus autocomplete="end_contract" />
            <x-input-error class="mt-2" :messages="$errors->get('end_contract')" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <x-select-input id="status" name="status" class="block w-full mt-1" :value="old('status')" required
                autofocus autocomplete="status">
                <option selected disabled></option>
                <option value="Berjalan" {{ old('status') === 'Berjalan' ? 'selected' : '' }}>
                    Berjalan
                </option>
                <option value="Tidak Berjalan" {{ old('status') === 'Tidak Berjalan' ? 'selected' : '' }}>
                    Tidak Berjalan
                </option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div class="col-span-2">
            <x-input-label for="salary" :value="__('Gaji')" />
            <x-text-input id="salary" name="salary" type="number" step="any" class="block w-full mt-1"
                :value="old('salary')" required autofocus autocomplete="salary" />
            <x-input-error class="mt-2" :messages="$errors->get('salary')" />
        </div>

        {{-- BUTTON SAVE --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Buat Data') }}</x-primary-button>

            @if (session('status') === 'karyawan-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600">{{ __('Berhasil membuat karyawan baru') }}</p>
            @endif
        </div>


    </form>
</section>
