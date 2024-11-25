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
                        Pagi
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Siang
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                        Sore
                    </p>
                </th>
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-slate-100">
                <td class="px-4 border-t border-blue-gray-50">
                    <span class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ now()->translatedFormat('l') }}
                    </span>
                    <span class="block font-sans text-xs antialiased font-normal leading-normal text-blue-gray-900">
                        {{ now()->translatedFormat('j F Y') }} sss
                    </span>
                </td>
                <td class="px-4 border-t border-blue-gray-50">

                    <?php
                    use Carbon\Carbon;
                    $now = Carbon::now();
                    $startPagi = Carbon::createFromTimeString('01:00');
                    $endPagi = Carbon::createFromTimeString('01:33');
                    ?>

                    @if ($now->between($startPagi, $endPagi))
                        <a href="{{ route('user.attendance.absen_pagi.create') }}"
                            class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                            Absen Pagi
                        </a>
                    @else
                    @endif


                </td>
                <td class="px-4 border-t border-blue-gray-50">
                    <?php
                    $startSiang = Carbon::createFromTimeString('12:34');
                    $endSiang = Carbon::createFromTimeString('16:49');
                    ?>

                    @if ($now->between($startSiang, $endSiang))
                        <a href="{{ route('user.attendance.absen_siang.create') }}"
                            class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                            Absen Siang
                        </a>
                    @else
                    @endif
                    </p>
                </td>
                <td class="px-4 border-t border-blue-gray-50">

                    <?php
                    $startSore = Carbon::createFromTimeString('12:34');
                    $endSore = Carbon::createFromTimeString('15:50');
                    ?>
                    @if ($now->between($startSore, $endSore))
                        <a href="{{ route('user.attendance.absen_sore.create') }}"
                            class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                            Absen Sore
                        </a>
                    @else
                    @endif

                    </p>
                </td>
                <td class="px-4 border-t border-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">

                    </p>
                </td>

            </tr>
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
                    <td x-data="{ deleteModal: false }" class="p-4 space-x-3 border-t border-blue-gray-50">

                        <a wire:navigate href="{{ route('user.attendance.detail', $a->id) }}"
                            class="font-sans text-sm antialiased font-semibold leading-normal text-blue-900 hover:underline hover:underline-offset-2 hover:decoration-1">
                            Detail
                        </a>

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
