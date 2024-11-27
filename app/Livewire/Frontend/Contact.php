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

        view()->share('title', 'Contect Us');
        view()->share('metatitle','');
        view()->share('keywords', '');
        view()->share('description', 'Feel free your any query or information about , any new news ');
    }

    public function render()
    {
        return view('livewire.frontend.contact');
    }
}
