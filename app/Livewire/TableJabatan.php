<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Position;

class TableJabatan extends Component
{
    public function render()
    {
        $positions = Position::all();

        return view('livewire.table-jabatan', compact('positions'));
    }
}
