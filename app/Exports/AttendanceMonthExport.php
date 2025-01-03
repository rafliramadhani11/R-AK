<?php

namespace App\Exports;

use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceMonthExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Attendance::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_key"),
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month_name"),
            DB::raw('COUNT(*) as total_attendance')
        )
            ->groupBy('month_key', 'month_name')
            ->orderByRaw('MIN(created_at)');
    }

    public function map($attendance): array
    {
        return [
            $attendance->month_name,
            $attendance->total_attendance,
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA BULAN',
            'TOTAL ABSEN',
        ];
    }
}
