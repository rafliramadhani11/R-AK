<?php

namespace App\Livewire\User;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableAttendanceMonth extends Component
{
    public $selectedMonth;

    public $selectedYear;

    public function mount()
    {
        $this->selectedMonth = now()->month();
        $this->selectedYear = now()->year();
    }

    public function render()
    {
        $attandances = Attendance::where('user_id', Auth::user()->id)->select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_key"),
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month_name"),
            DB::raw('COUNT(*) as total_attendance')
        )->groupBy('month_key', 'month_name')
            ->orderByRaw('MIN(created_at)')
            ->get();

        return view('livewire.user.table-attendance-month', compact('attandances'));
    }
}
