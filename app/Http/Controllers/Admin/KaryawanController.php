<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Activity;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\KaryawanStoreRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\Position;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('admin.karyawan.index');
    }

    public function create()
    {
        $positions = Position::all();
        return view('admin.karyawan.create', compact('positions'));
    }

    public function store(KaryawanStoreRequest $request)
    {
        $request['id_phl'] = fake()->numerify('########');

        $user = User::create([
            "admin" => false,
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "gender" => $request->gender,
            "phone" => $request->phone,
            "address" => $request->address,
            'position_id' => $request->position_id,
            'job_place' => $request->job_place,
            'id_phl' => $request->id_phl
        ]);

        Contract::create([
            'user_id' => $user->id,
            "no_contract" => $request->no_contract,
            "start_contract" => $request->start_contract,
            "end_contract" => $request->end_contract,
            "status" => $request->status,
            "salary" => $request->salary,
        ]);

        return redirect()->route('admin.karyawan.index')->with('status', 'karyawan-created');
    }

    public function detail(User $user)
    {
        $user = User::where('id', $user->id)->with('contract', 'position')->first();

        $position = $user->position;

        $contract = $user->contract;

        return view('admin.karyawan.detail', compact('user', 'position', 'contract'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('status', 'karyawan-deleted');
    }
}
