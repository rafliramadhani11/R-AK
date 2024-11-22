<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\Activity;

class KaryawanController extends Controller
{
    public function index()
    {

        return view('admin.karyawan.index');
    }

    public function detail(User $user)
    {
        $position = $user->position;
        $activity = Activity::where('position_id', '=', $position->id)->first();

        return view('admin.karyawan.detail', compact('user', 'activity'));
    }
}
