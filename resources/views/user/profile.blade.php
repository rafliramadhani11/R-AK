<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="w-full">

                    <form method="post" action="{{ route('user.update.profile') }}"
                        class="space-y-5 md:grid md:grid-cols-2 gap-x-5 gap-y-5 md:space-y-0">
                        @csrf
                        @method('patch')

                        <header class="col-span-2">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                                :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                            <x-select-input id="gender" name="gender" class="block w-full mt-1" :value="old('gender', $user->gender)"
                                required autofocus autocomplete="gender">
                                <option value="Laki - Laki"
                                    {{ old('gender', $user->gender) === 'Laki - Laki' ? 'selected' : '' }}>
                                    Laki - Laki
                                </option>
                                <option value="Perempuan"
                                    {{ old('gender', $user->gender) === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('No Handphone')" />
                            <x-text-input id="phone" name="phone" type="number" class="block w-full mt-1"
                                :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Alamat')" />
                            <x-text-input id="address" name="address" type="text" class="block w-full mt-1"
                                :value="old('address', $user->address)" required autofocus autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>

                        <div>
                            <x-input-label for="position_id" :value="__('Jabatan')" />

                            <x-select-input id="position_id" name="position_id" class="block w-full mt-1" required
                                autofocus>
                                <option value="" disabled
                                    {{ old('position_id', $user->position_id) ? '' : 'selected' }}>

                                </option>
                                @foreach ($positions as $p)
                                    <option value="{{ $p->id }}"
                                        {{ old('position_id', $user->position_id) === $p->id ? 'selected' : '' }}>
                                        {{ $p->name }}
                                    </option>
                                @endforeach
                            </x-select-input>

                            <x-input-error class="mt-2" :messages="$errors->get('position_id')" />
                        </div>

                        <div>
                            <x-input-label for="job_place" :value="__('Lokasi Kerja')" />
                            <x-text-input id="job_place" name="job_place" type="text" class="block w-full mt-1"
                                :value="old('job_place', $user->job_place)" required autofocus autocomplete="job_place" />
                            <x-input-error class="mt-2" :messages="$errors->get('job_place')" />
                        </div>

                        <div class="flex items-center col-span-2 gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-gray-600">{{ __('Terimpan.') }}</p>
                            @endif
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
