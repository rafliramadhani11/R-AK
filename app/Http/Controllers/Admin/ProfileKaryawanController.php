<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\ContractUpdateRequest;
use App\Models\Contract;

class ProfileKaryawanController extends Controller
{
    public function updateProfile(User $user, ProfileUpdateRequest $request)
    {
        $user->fill($request->validated());

        $user->save();

        return redirect()->route('admin.karyawan.detail', $user->id_phl)->with('status', 'profile-updated');
    }

    public function updateContract(Contract $contract, ContractUpdateRequest $request)
    {
        $contract->fill($request->validated());

        $contract->save();

        return back()->with('status', 'contract-updated');
    }
}
