<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AttendanceMonthController extends Controller
{
    public function index()
    {
        Gate::authorize('adminDashboard', Auth::user());

        return view('admin.allAttendance.index');
    }

    public function detail($month)
    {
        Gate::authorize('adminDashboard', Auth::user());

        return view('admin.allAttendance.detail', compact('month'));
    }
}
