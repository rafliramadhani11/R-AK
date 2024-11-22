<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\Attributes\On;
use Livewire\WithPagination;

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

    public function render()
    {
        $attendances = Attendance::withoutAdmin()
            ->searchUser($this->search)->attendanceToday()
            ->with('user')->paginate(10);

        return view('livewire.absensi-today', compact('attendances'));
    }
}
