<?php

namespace App\Livewire;

use App\Exports\UsersExport;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TableKaryawan extends Component
{
    use WithPagination;

    public $search = '';

    #[On('searchUpdated')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'Data-Karyawan.xlsx');
    }

    public function render()
    {

        $users = User::where('admin', false)
            ->orderBy('created_at', 'desc')
            ->searchUser($this->search)
            ->with(['position', 'contract'])
            ->paginate(10);

        return view('livewire.table-karyawan', compact('users'));
    }
}
