<?php

namespace App\Http\Controllers\Admin;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.jabatan.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['min:3', 'required']
        ]);

        Position::create($validated);

        return back()->with('status', 'jabatan-created');
    }

    public function detail(Position $position)
    {
        $users = $position->users()->where('admin', 0)->get();

        return view('admin.jabatan.detail', compact('position', 'users'));
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return back()->with('status', 'jabatan-deleted');
    }
}
