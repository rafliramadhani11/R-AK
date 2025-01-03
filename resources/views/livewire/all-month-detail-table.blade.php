<div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700">
    <div class="py-2 mb-5">
        <x-primary-button wire:click='exportExcel' wire:loading.attr='disabled'>
            Export Excel
        </x-primary-button>
    </div>
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Nama Karyawan
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Tanggal
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
                        <span class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $a->created_at->translatedFormat('l') }}
                        </span>
                        <span class="block font-sans text-xs antialiased font-normal leading-normal text-blue-gray-900">
                            {{ $a->created_at->translatedFormat('j F Y') }}
                        </span>
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
                    {{-- <td class="p-4 space-x-3 border-t border-blue-gray-50">
                        <a  href="{{ route('admin.absenToday.detail', $a->id) }}"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-blue-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Detail
                        </a>
                        <a href="#" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-absen')"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-red-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Hapus
                        </a>

                    </td> --}}
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
