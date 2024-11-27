<div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700">

    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Nama Jabatan
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Total Karyawan
                    </p>
                </th>

                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($positions as $p)
                <tr>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-gray-900">
                            {{ $p->name }}
                        </p>
                    </td>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $p->users()->where('admin', 0)->count() }}
                        </p>
                    </td>
                    <td x-data="{ deleteModal: false }" class="p-4 space-x-3 border-t border-blue-gray-50">
                        <a wire:navigate href="{{ route('admin.jabatan.detail', $p->id) }}"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-blue-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Detail
                        </a>

                        <a href="#" @click.prevent="deleteModal = true"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-red-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Hapus
                        </a>

                        <x-delete-modal>
                            <form action="{{ route('admin.jabatan.destroy', $p->id) }}" method="post">
                                @csrf

                                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">

                                        {{-- ICON --}}
                                        <div
                                            class="flex items-center justify-center mx-auto bg-red-100 rounded-full size-12 shrink-0 sm:mx-0 sm:size-10">
                                            <x-icons.danger />
                                        </div>
                                        {{-- BODY --}}
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">

                                            <h2 class="text-base font-semibold text-gray-900">
                                                {{ __('Kamu yakin akan menghapus Jabatan ini ?') }}
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-500">
                                                <span class="font-semibold text-gray-900 underline">
                                                    Data karyawan dan Jabatan ini
                                                </span>
                                                akan di hapus secara permanen dan tidak akan bisa di kembalikan.
                                            </p>

                                            <div class="flex items-end mt-6 space-x-5 underline-offset-8">

                                                <div class="text-2xl font-bold leading-none">
                                                    {{ $p->name }}
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    {{-- FOOTER --}}
                                    <div class="flex justify-end mt-6">

                                        <x-secondary-button @click="deleteModal = false">
                                            {{ __('Tidak') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Hapus Jabatan') }}
                                        </x-danger-button>

                                    </div>
                                </div>

                            </form>
                        </x-delete-modal>

                    </td>
                </tr>
            @empty
                <td class="p-4 border-t border-blue-gray-50" colspan="3">
                    <p
                        class="block font-sans text-sm antialiased font-semibold leading-normal text-center text-gray-900">
                        Data tidak ditemukan
                    </p>
                </td>
            @endforelse


        </tbody>
    </table>

</div>
