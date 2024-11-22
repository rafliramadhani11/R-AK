<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function absenToday()
    {
        return view('admin.attendanceToday.index');
    }

    public function absenMonth()
    {
        return view('admin.allAttendance.index');
    }
}
