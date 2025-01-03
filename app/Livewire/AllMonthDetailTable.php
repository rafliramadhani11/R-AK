<?php

namespace App\Livewire;

use App\Exports\AttendanceMonthDetailExport;
use App\Models\Attendance;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AllMonthDetailTable extends Component
{
    use WithPagination;

    public $month;

    public $search = '';

    #[On('searchUpdated')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function exportExcel()
    {
        return Excel::download(
            new AttendanceMonthDetailExport($this->month), 'Absen-Detail-'.$this->month.'.xlsx');
    }

    public function render()
    {
        $attendances = Attendance::whereYear('created_at', '=', substr($this->month, 0, 4))
            ->whereMonth('created_at', '=', substr($this->month, 5, 2))
            ->withoutAdmin()
            ->orderBy('created_at', 'desc')
            ->searchUser($this->search)
            ->with('user')
            ->paginate(10);

        return view('livewire.all-month-detail-table', compact('attendances'));
    }
}
