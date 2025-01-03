<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceMonthDetailExport implements FromQuery, WithHeadings, WithMapping
{
    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function query()
    {
        return Attendance::whereYear('created_at', '=', substr($this->month, 0, 4))
            ->whereMonth('created_at', '=', substr($this->month, 5, 2))
            ->withoutAdmin()
            ->orderBy('created_at', 'desc')
            ->with('user');
    }

    public function map($attendance): array
    {
        return [
            $attendance->user->name,
            $attendance->created_at->translatedFormat('j F Y'),
            $attendance->start ?? 'IZIN',
            $attendance->middle ?? '',
            $attendance->end ?? '',
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA KARYAWAN',
            'TANGGAL KEHADIRAN',
            'ABSEN PAGI',
            'ABSEN SIANG',
            'ABSEN SORE',
        ];
    }
}
