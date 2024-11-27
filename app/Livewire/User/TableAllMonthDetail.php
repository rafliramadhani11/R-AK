<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class TableAllMonthDetail extends Component
{
    use WithPagination;
    public $month;

    public function render()
    {
        $attendances = Attendance::where('user_id', Auth::user()->id)->whereYear('created_at', '=', substr($this->month, 0, 4))
            ->whereMonth('created_at', '=', substr($this->month, 5, 2))
            ->withoutAdmin()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.user.table-all-month-detail', compact('attendances'));
    }
}
