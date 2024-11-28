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
                <th class="p-4 border-b border-gray-300 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-semibold leading-none text-gray-900">
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-slate-100 ">
                <td class="px-4 border-t border-blue-gray-50">
                    <span class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ now()->translatedFormat('l') }}
                    </span>
                    <span class="block font-sans text-xs antialiased font-normal leading-normal text-blue-gray-900">
                        {{ now()->translatedFormat('j F Y') }}
                    </span>
                </td>
                <td class="px-4 border-t border-blue-gray-50">

                    <?php
                    use Carbon\Carbon;
                    $now = Carbon::now();
                    $startPagi = Carbon::createFromTimeString('00:00');
                    $endPagi = Carbon::createFromTimeString('23:00');
                    ?>

                    @if ($now->between($startPagi, $endPagi))
                        {{-- Jika tidak ada data attendance --}}
                        @if (!$latestAttendance)
                            <a href="{{ route('user.attendance.absen_pagi.create') }}"
                                class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                                Absen Pagi
                            </a>
                        @else
                            {{-- Jika ada data attendance, periksa apakah hari ini --}}
                            @if ($latestAttendance->created_at->format('Y-m-d') === $now->format('Y-m-d'))
                                {{-- Jika absen pagi belum dilakukan --}}
                                @if (is_null($latestAttendance->start) && $latestAttendance->izin_status === 0)
                                    <a href="{{ route('user.attendance.absen_pagi.create') }}"
                                        class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                                        Absen Pagi
                                    </a>
                                @endif
                            @else
                                {{-- Jika data attendance ada tetapi bukan hari ini --}}
                                <a href="{{ route('user.attendance.absen_pagi.create') }}"
                                    class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                                    Absen Pagi
                                </a>
                            @endif
                        @endif

                    @endif


                </td>
                <td class="px-4 border-t border-blue-gray-50">
                    <?php
                    $startSiang = Carbon::createFromTimeString('00:00');
                    $endSiang = Carbon::createFromTimeString('23:00');
                    ?>

                    @if ($now->between($startSiang, $endSiang))

                        @if ($latestAttendance && $latestAttendance->created_at->format('Y-m-d') === $now->format('Y-m-d'))
                            @if (is_null($latestAttendance->middle) && $latestAttendance->izin_status === 0)
                                <a href="{{ route('user.attendance.absen_siang.create') }}"
                                    class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                                    Absen Siang
                                </a>
                            @endif
                        @endif
                    @endif
                </td>
                <td class="px-4 border-t border-blue-gray-50">

                    <?php
                    $startSore = Carbon::createFromTimeString('00:00');
                    $endSore = Carbon::createFromTimeString('23:00');
                    ?>
                    @if ($now->between($startSore, $endSore))

                        @if ($latestAttendance && $latestAttendance->created_at->format('Y-m-d') === $now->format('Y-m-d'))

                            @if (is_null($latestAttendance->end) && $latestAttendance->izin_status === 0)
                                <a href="{{ route('user.attendance.absen_sore.create') }}"
                                    class="px-3 py-1 text-xs font-semibold text-white uppercase duration-300 rounded bg-slate-800 hover:bg-slate-700 transation">
                                    Absen Sore
                                </a>
                            @endif

                        @endif

                    @endif
                </td>
                <td class="px-4 border-t border-blue-gray-50">
                </td>
                <td x-data="{ deleteModal: false }" class="px-4 border-t border-blue-gray-50">

                    <?php
                    $startIzin = Carbon::createFromTimeString('00:00');
                    $endIzin = Carbon::createFromTimeString('23:00');
                    ?>

                    @if ($now->between($startIzin, $endIzin))

                        @if (!$latestAttendance)
                            <a href="#" @click.prevent="deleteModal = true"
                                class="px-3 py-1 text-xs font-semibold tracking-wide text-white uppercase duration-300 rounded bg-amber-500 hover:bg-amber-400 transation">
                                Izin
                            </a>
                        @else
                            {{-- Jika ada data attendance, periksa apakah hari ini --}}
                            @if ($latestAttendance->created_at->format('Y-m-d') === $now->format('Y-m-d'))
                                {{-- Jika absen pagi belum dilakukan --}}

                                @if (is_null($latestAttendance->start) && $latestAttendance->izin_status === 0)
                                    <a href="#" @click.prevent="deleteModal = true"
                                        class="px-3 py-1 text-xs font-semibold tracking-wide text-white uppercase duration-300 rounded bg-amber-500 hover:bg-amber-400 transation">
                                        Izin
                                    </a>
                                @endif
                            @else
                                {{-- Jika data attendance ada tetapi bukan hari ini --}}
                                <a href="#" @click.prevent="deleteModal = true"
                                    class="px-3 py-1 text-xs font-semibold tracking-wide text-white uppercase duration-300 rounded bg-amber-500 hover:bg-amber-400 transation">
                                    Izin
                                </a>
                            @endif
                        @endif
                    @endif




                    <x-delete-modal>
                        <form action="{{ route('user.absen-izin.store') }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="px-4 pb-4 bg-white sm:pt-3 sm:pb-4">
                                <div class=" sm:flex sm:items-start">
                                    {{-- BODY --}}
                                    <div class="w-full mt-3 text-center sm:mt-0 sm:text-left">

                                        <h2 class="text-base font-semibold text-gray-900 text-start">
                                            {{ __('Buat Alasan Izin') }}
                                        </h2>

                                        <div class="mt-3 text-start ">
                                            <x-input-label for="alasan" value="Alasan" />
                                            <x-text-input id="alasan" name="alasan_izin" class="w-full" />
                                        </div>

                                    </div>

                                </div>
                                {{-- FOOTER --}}
                                <div class="flex justify-end mt-6">

                                    <x-secondary-button @click="deleteModal = false">
                                        {{ __('Tidak') }}
                                    </x-secondary-button>

                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md ms-3 bg-amber-600 hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                                        {{ __('Buat Izin') }}
                                    </button>



                                </div>
                            </div>

                        </form>


                    </x-delete-modal>

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
                    <td class="p-4 border-t border-blue-gray-50">

                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            @if ($a->izin_status === 1)
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium tracking-wide text-yellow-800 uppercase rounded-md bg-yellow-50 ring-1 ring-inset ring-yellow-600/20">
                                    Izin
                                </span>
                            @elseif ($a->start && $a->middle && $a->end)
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium tracking-wide text-green-700 uppercase rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">
                                    Hadir
                                </span>
                            @endif

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
