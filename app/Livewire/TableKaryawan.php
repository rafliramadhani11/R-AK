<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

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

    public function render()
    {

        $users = User::where('admin', false)
            ->orderBy('created_at', 'desc')
            ->searchUser($this->search)
            ->paginate(10);

        return view('livewire.table-karyawan', compact('users'));
    }
}
