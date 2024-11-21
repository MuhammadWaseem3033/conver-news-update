<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class CategoryPage extends Component
{
    public $Categories;
    public function mount()
    {
        $this->Categories = Category::getCategoryPage();
    }
    public function render()
    {
        return view('livewire.frontend.category-page');
    }
}
