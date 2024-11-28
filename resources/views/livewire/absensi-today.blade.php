<div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700">
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Name
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Start
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Middle
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        End
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendances as $a)
                <tr>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-gray-900">
                            {{ $a->user->name }}
                        </p>
                    </td>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $a->start }}
                        </p>
                    </td>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $a->middle }}
                        </p>
                    </td>
                    <td class="p-4 border-t border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $a->end }}
                        </p>
                    </td>
                    <td class="p-4 border-t border-blue-gray-50">

                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            @if ($a->izin_status === 1)
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium tracking-wide text-yellow-800 uppercase rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-600/20">
                                    Izin
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium tracking-wide text-green-700 uppercase rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">
                                    Hadir
                                </span>
                            @endif

                        </p>

                    </td>
                    <td x-data="{ deleteModal: false }" class="p-4 space-x-3 border-t border-blue-gray-50">
                        <a wire:navigate href="{{ route('admin.absenToday.detail', $a->id) }}"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-blue-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Detail
                        </a>

                        <a href="#" x-data="" @click.prevent="deleteModal = true"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-red-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Hapus
                        </a>

                        <x-delete-modal>
                            <form action="{{ route('admin.absenToday.delete', $a->id) }}" method="post">
                                @csrf
                                @method('delete')
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
                                                {{ __('Kamu yakin akan menghapus absensi ini ?') }}
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-500">
                                                <span class="font-semibold text-gray-900 underline">
                                                    Data absensi ini
                                                </span>
                                                akan di hapus secara permanen dan tidak akan bisa di kembalikan.
                                            </p>

                                            <div class="flex items-end mt-6 space-x-5 underline-offset-8">
                                                <div class="text-2xl font-bold leading-none">
                                                    {{ $a->user->name }}
                                                </div>

                                                <div class="font-semibold leading-none">
                                                    {{ $a->created_at->translatedFormat('l, ') }}
                                                    {{ $a->created_at->translatedFormat('j F Y') }}
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
                                            {{ __('Hapus Absen') }}
                                        </x-danger-button>


                                    </div>
                                </div>

                            </form>


                        </x-delete-modal>



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
        {{ $attendances->links(data: ['scrollTo' => false]) }}
    </div>
</div>
