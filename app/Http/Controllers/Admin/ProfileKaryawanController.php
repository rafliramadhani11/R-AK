<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;

class ProfileKaryawanController extends Controller
{
    public function updateProfile(User $user, ProfileUpdateRequest $request)
    {
        $user->fill($request->validated());

        $user->save();

        return redirect()->route('admin.karyawan.detail', $user->id_phl)->with('status', 'profile-updated');
    }

    public function updateJob(Activity $activity, JobUpdateRequest $request)
    {
        $activity->position->fill([
            'name' => $request->jabatan
        ]);

        $activity->fill([
            'activity_name' => $request->kegiatan,
            'sub_activity' => $request->sub_kegiatan,
            'task' => $request->pask
        ]);

        $activity->position->save();

        $activity->save();

        return back()->with('status', 'job-updated');
    }
}
