<?php

namespace App\Livewire\Frontend;

use App\Models\AboutUs as ModelsAboutUs;
use Livewire\Component;

class AboutUS extends Component
{
    public $getData;

    public function mount()
    {
        $this->getData = ModelsAboutUs::get()->first();
    }
    
    public function render()
    {
        return view('livewire.frontend.about-u-s');
    }
}
