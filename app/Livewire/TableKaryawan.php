<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TableKaryawan extends Component
{
    use WithPagination;

    public function render()
    {

        $users = User::where('admin', false)->paginate(10);

        return view('livewire.table-karyawan', compact('users'));
    }
}
