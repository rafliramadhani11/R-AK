<?php

namespace App\Livewire;

use App\Exports\AttendanceMonthExport;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AbsenMonth extends Component
{
    public $selectedMonth;

    public $selectedYear;

    public function mount()
    {
        $this->selectedMonth = now()->month();
        $this->selectedYear = now()->year();
    }

    public function exportExcel()
    {
        return Excel::download(new AttendanceMonthExport, 'Total-Absensi-Bulanan.xlsx');
    }

    public function render()
    {

        $attendances = Attendance::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_key"),
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month_name"),
            DB::raw('COUNT(*) as total_attendance')
        )
            ->groupBy('month_key', 'month_name')
            ->orderByRaw('MIN(created_at)')
            ->get();

        return view('livewire.absen-month', compact('attendances'));
    }
}
