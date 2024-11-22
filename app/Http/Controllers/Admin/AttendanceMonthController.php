<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceMonthController extends Controller
{
    public function index()
    {
        return view('admin.allAttendance.index');
    }

    public function detail($month)
    {

        return view('admin.allAttendance.detail', compact('month'));
    }
}
