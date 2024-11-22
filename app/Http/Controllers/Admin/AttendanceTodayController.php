<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\UpdateAbsenTodayRequest;

class AttendanceTodayController extends Controller
{
    public function index()
    {
        return view('admin.attendanceToday.index');
    }

    public function detail(Attendance $attendance)
    {
        return view('admin.attendanceToday.detail', compact('attendance'));
    }

    public function update(UpdateAbsenTodayRequest $request, Attendance $attendance)
    {
        $attendance->fill($request->validated());

        $attendance->save();

        return back()->with('status', 'absen-updated');
    }

    public function destroy(Request $request, Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('admin.absenToday.index');
    }
}
