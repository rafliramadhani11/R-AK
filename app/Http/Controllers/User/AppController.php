<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Models\Attendance;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AppController extends Controller
{
    // ATENDENCE TODAY
    public function index()
    {
        Gate::authorize('userDashboard', Auth::user());

        $user = Auth::user();

        return view('user.index', compact('user'));
    }

    public function create_absenPagi()
    {
        Gate::authorize('userDashboard', Auth::user());

        return view('user.absen.create-absen-pagi');
    }

    public function create_absenSiang()
    {
        Gate::authorize('userDashboard', Auth::user());

        return view('user.absen.create-absen-siang');
    }

    public function create_absenSore()
    {
        Gate::authorize('userDashboard', Auth::user());

        return view('user.absen.create-absen-sore');
    }

    public function detail(Attendance $attendance)
    {
        Gate::authorize('userDashboard', Auth::user());
        if (Auth::user()->id !== $attendance->user_id) {
            abort(403, 'ANDA DILARANG MENGAKSES INI !!!');
        }

        return view('user.absen.detail', compact('attendance'));
    }

    // ATTENDENCE MONTH
    public function allMonth()
    {
        Gate::authorize('userDashboard', Auth::user());

        return view('user.absenMonth.index');
    }

    public function detailMonth($month)
    {
        Gate::authorize('userDashboard', Auth::user());

        return view('user.absenMonth.detail', compact('month'));
    }

    // PROFILE

    public function profile(Request $request)
    {
        if (Auth::user()->id !== $request->user()->id) {
            abort(403, 'ANDA DILARANG MENGAKSES INI !!!');
        }

        return view('user.profile', [
            'user' => $request->user(),
            'positions' => Position::all(),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        if (Auth::user()->id !== $request->user()->id) {
            abort(403, 'ANDA DILARANG MENGAKSES INI !!!');
        }

        $request->user()->fill($request->validated());

        $request->user()->save();

        return back()->with('status', 'profile-updated');
    }
}
