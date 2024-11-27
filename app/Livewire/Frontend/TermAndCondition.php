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
        view()->share('title', 'Terms and Conditions');
        view()->share('metatitle','');
        view()->share('keywords', '');
        view()->share('description', ''); 
    }

    public function render()
    {
        return view('livewire.frontend.term-and-condition');
    }
}
