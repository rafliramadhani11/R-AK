<?php

namespace App\Livewire\Admin\AbsenPagi;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $img_start;

    #[Validate('required|min:3')]
    public $start_activity;

    #[Validate('required')]
    public $start;

    public function mount()
    {
        $this->start = now()->format('H:i');
    }

    public function store()
    {
        $validated = $this->validate();
        $img = $validated['img_start'];
        $folderPath = 'img/img_start/';
        $image_parts = explode(';base64,', $img);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_base64 = base64_decode($image_parts[1]);

        $fileName = uniqid().'.png';
        $file = $folderPath.$fileName;
        $validated['img_start'] = $fileName;

        dd($validated);
    }

    public function render()
    {
        return view('livewire.admin.absen-pagi.create');
    }
}
