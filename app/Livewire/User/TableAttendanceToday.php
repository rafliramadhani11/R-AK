<?php

namespace App\Livewire\User;

use App\Models\Attendance;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TableAttendanceToday extends Component
{
    public function render()
    {
        $user = Auth::user();

        $latestAttendance = Attendance::where('user_id', Auth::id())->latest('created_at')->first();

        $attendances = Attendance::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')->paginate(8);

        return view('livewire.user.table-attendance-today', compact('attendances', 'latestAttendance'));
    }
}
