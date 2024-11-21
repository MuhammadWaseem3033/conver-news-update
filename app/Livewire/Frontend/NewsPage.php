<?php

namespace App\Livewire\Frontend;

use App\Models\News;
use Livewire\Component;

class NewsPage extends Component
{
    public $News;
    public function mount()
    {
        $this->News = News::getNews();
    }

    public function render()
    {
        return view('livewire.frontend.news-page');
    }
}
