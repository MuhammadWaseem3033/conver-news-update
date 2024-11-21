<?php

namespace App\Livewire\Frontend;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $getData;

    public function mount()
    {
        $this->getData = ModelsContact::get()->first();
    }

    public function render()
    {
        return view('livewire.frontend.contact');
    }
}
