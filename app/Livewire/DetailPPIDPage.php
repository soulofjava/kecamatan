<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PPID; // Assuming PPID is the model you're working with

class DetailPPIDPage extends Component
{
    public $slug, $artikel;

    public function mount($slug)
    {
        $this->artikel = PPID::where('slug', $slug)->first();

        if (!$this->artikel) {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.detail-p-p-i-d-page');
    }
}
