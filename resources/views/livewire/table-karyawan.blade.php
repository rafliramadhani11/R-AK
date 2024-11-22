<div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700">
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        ID PHL
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Nama Karyawan
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Jabatan
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        No. Kontrak
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Status Kontrak
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Lokasi Kerja
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $u)
                <tr>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-gray-900">
                            {{ $u->id_phl }}
                        </p>
                    </td>

                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $u->name }}
                        </p>
                    </td>

                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $u->position->name }}
                        </p>
                    </td>

                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $u->contract->no_contract }}
                        </p>
                    </td>

                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $u->contract->status }}
                        </p>
                    </td>

                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $u->job_place }}
                        </p>
                    </td>

                    <td class="p-4 space-x-3 border-t border-blue-gray-50">
                        <a wire:navigate href="{{ route('admin.karyawan.detail', $u->id_phl) }}"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-blue-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Detail
                        </a>

                        <a href="#" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-absen')"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-red-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Hapus
                        </a>

                        {{-- <x-modal name="confirm-delete-absen" focusable>

                            <form action="#" method="post" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Kamu yakin akan menghapus absensi ini ?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Data absensi ini akan di hapus secara permanen dan tidak akan bisa di kembalikan. ') }}
                                </p>

                                <div class="flex items-end mt-6 space-x-5 underline underline-offset-8">
                                    <div class="text-2xl font-bold leading-none">
                                        {{ $u->name }}
                                    </div>

                                    <div class="font-semibold leading-none">
                                        {{ $u->name }}
                                    </div>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Tidak') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('Hapus Absen') }}
                                    </x-danger-button>
                                </div>

                            </form>

                        </x-modal> --}}

                    </td>

                </tr>
            @empty
                <td class="p-4 border-t border-blue-gray-50" colspan="6">
                    <p
                        class="block font-sans text-sm antialiased font-semibold leading-normal text-center text-gray-900">
                        Data tidak ditemukan
                    </p>
                </td>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        {{ $users->links(data: ['scrollTo' => false]) }}
    </div>
</div>
