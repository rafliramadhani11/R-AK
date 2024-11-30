<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PositionController extends Controller
{
    public function index()
    {
        Gate::authorize('adminDashboard', Auth::user());

        return view('admin.jabatan.index');
    }

    public function store(Request $request)
    {
        Gate::authorize('adminDashboard', Auth::user());
        $validated = $request->validate([
            'name' => ['min:3', 'required'],
        ]);

        Position::create($validated);

        return back()->with('status', 'jabatan-created');
    }

    public function detail(Position $position)
    {
        Gate::authorize('adminDashboard', Auth::user());
        $users = $position->users()->where('admin', 0)->get();

        return view('admin.jabatan.detail', compact('position', 'users'));
    }

    public function destroy(Position $position)
    {
        Gate::authorize('adminDashboard', Auth::user());
        $position->delete();

        return back()->with('status', 'jabatan-deleted');
    }
}
