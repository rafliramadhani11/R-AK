<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Attendance::withoutAdmin()
            ->attendanceToday()
            ->with('user');
    }

    public function map($attendance): array
    {
        return [
            $attendance->user->name,
            $attendance->start,
            $attendance->middle,
            $attendance->end,
            $attendance->izin_status ? 'IZIN' : 'HADIR',
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA KARYAWAN',
            'ABSEN MASUK',
            'ABSEN SIANG',
            'ABSEN SORE',
            'STATUS KEHADIRAN',
        ];
    }
}
