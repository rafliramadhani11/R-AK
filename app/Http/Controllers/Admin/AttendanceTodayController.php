<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAbsenTodayRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AttendanceTodayController extends Controller
{
    public function index()
    {
        Gate::authorize('adminDashboard', Auth::user());

        return view('admin.attendanceToday.index');
    }

    public function detail(Attendance $attendance)
    {
        Gate::authorize('adminDashboard', Auth::user());

        return view('admin.attendanceToday.detail', compact('attendance'));
    }

    public function update(UpdateAbsenTodayRequest $request, Attendance $attendance)
    {
        Gate::authorize('adminDashboard', Auth::user());
        $attendance->fill($request->validated());

        $attendance->save();

        return back()->with('status', 'absen-updated');
    }

    public function destroy(Request $request, Attendance $attendance)
    {
        Gate::authorize('adminDashboard', Auth::user());
        $attendance->delete();

        return redirect()->route('admin.absenToday.index');
    }
}
