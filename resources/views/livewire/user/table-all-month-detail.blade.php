<div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700">
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>
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
