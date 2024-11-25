<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    // ATENDENCE TODAY
    public function index()
    {
        $user = Auth::user();
        $latestAttendance = Attendance::where('user_id', $user->id)->latest('created_at')->first();


        return view('user.index', compact('user'));
    }

    public function create_absenPagi()
    {
        return view('user.absen.create-absen-pagi');
    }

    public function create_absenSiang()
    {
        return view('user.absen.create-absen-siang');
    }

    public function create_absenSore()
    {
        return view('user.absen.create-absen-sore');
    }

    public function detail(Attendance $attendance)
    {
        return view('user.absen.detail', compact('attendance'));
    }

    // ATTENDENCE MONTH
    public function allMonth()
    {
        return view('user.absenMonth.index');
    }

    public function detailMonth($month)
    {
        return view('user.absenMonth.detail', compact('month'));
    }

    // PROFILE

    public function profile(Request $request)
    {
        return view('user.profile', [
            'user' => $request->user(),
            'positions' => Position::all()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        $request->user()->save();

        return back()->with('status', 'profile-updated');
    }
}
