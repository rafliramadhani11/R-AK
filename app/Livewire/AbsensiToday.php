<?php

namespace App\Livewire;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiToday extends Component
{
    use WithPagination;

    public $search = '';

    #[On('searchUpdated')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function exportExcel()
    {
        return Excel::download(new AttendanceExport, 'Absen-Hari-ini.xlsx');
    }

    public function render()
    {
        $attendances = Attendance::withoutAdmin()
            ->searchUser($this->search)->attendanceToday()
            ->with('user')->paginate(10);

        return view('livewire.absensi-today', compact('attendances'));
    }
}
