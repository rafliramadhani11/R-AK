<?php

namespace App\Livewire;

use Livewire\Component;

class SearchUserAttendance extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('searchUpdated', $this->search);
    }

    public function render()
    {
        return view('livewire.search-user-attendance');
    }
}
