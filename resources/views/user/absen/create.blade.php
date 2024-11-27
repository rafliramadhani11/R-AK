<?php
use Carbon\Carbon;

$now = Carbon::now();

$absenPagiStart = Carbon::createFromTime(6, 30)->format('H:i');
$absenPagiEnd = Carbon::createFromTime(8, 30);

$absenSiangStart = Carbon::createFromTime(12, 30);
$absenSiangEnd = Carbon::createFromTime(14, 30);

$absenSoreStart = Carbon::createFromTime(16, 30);
$absenSoreEnd = Carbon::createFromTime(18, 30);

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Buat Absen') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-3">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between px-6 py-3 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="flex flex-col text-gray-900">
                    <span class="text-xl font-bold">{{ $now->translatedFormat('l') }} sss</span>
                    <span class="text-sm text-slate-500">{{ $now->translatedFormat('j F Y') }}</span>
                </div>

            </div>
        </div>




        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-full">

                    @if ($latestAttendance->created_at->format('Y-m-d') === now()->format('Y-m-d'))
                        @if ($latestAttendance->start)
                            @if ($now->between($absenSiangStart, $absenSiangEnd))
                                waktunya absen siang
                            @else
                                Tunggu Absen siang
                            @endif
                        @else
                            Sudah ada absen hari ini
                        @endif
                    @else
                        @if ($now->between($absenPagiStart, $absenPagiEnd))
                            @include('user.absen.partials.absen-pagi')
                        @else
                            bukan waktu absen pagi
                        @endif

                    @endif

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
