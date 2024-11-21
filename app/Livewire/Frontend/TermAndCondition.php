<?php

namespace App\Livewire\Frontend;

use App\Models\TermAndConditions;
use Livewire\Component;

class TermAndCondition extends Component
{
    public $getData;

    public function mount()
    {
        $this->getData = TermAndConditions::get()->first();
    }

    public function render()
    {
        return view('livewire.frontend.term-and-condition');
    }
}
