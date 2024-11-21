<?php

namespace App\Livewire\Frontend;

use App\Models\Policy;
use Livewire\Component;

class Privacyandpolicy extends Component
{
    public $getData;

    public function mount()
    {
        $this->getData = Policy::get()->first();
    }

    public function render()
    {
        return view('livewire.frontend.privacyandpolicy');
    }
}
