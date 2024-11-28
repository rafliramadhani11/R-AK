<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\ContractUpdateRequest;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileKaryawanController extends Controller
{
    public function updateProfile(User $user, ProfileUpdateRequest $request)
    {
        $user->fill($request->validated());

        $user->save();

        return redirect()->route('admin.karyawan.detail', $user->id_phl)->with('status', 'profile-updated');
    }

    public function updateJob(Request $request, User $user)
    {
        $validated = $request->validate([
            'position_id' => 'required',
            'id_phl' => 'required|numeric',
            'job_place' => 'required|string',
        ]);

        $user->fill([
            'id_phl' => $validated['id_phl'],
            'job_place' => $validated['job_place'],
            'position_id' => $validated['position_id'],
        ]);

        $user->save();

        return back()->with('status', 'job-updated');
    }

    public function updateContract(Contract $contract, ContractUpdateRequest $request)
    {
        $contract->fill($request->validated());

        $contract->save();

        return back()->with('status', 'contract-updated');
    }
}
