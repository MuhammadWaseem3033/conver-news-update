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
        view()->share('title', 'Privacy and Policy');
        view()->share('metatitle','');
        view()->share('keywords', '');
        view()->share('description', '');
    }

    public function render()
    {
        return view('livewire.frontend.privacyandpolicy');
    }
}
