<?php

namespace App\Livewire\Frontend;

use App\Models\News;
use Livewire\Component;

class NewsByTag extends Component
{
    public $tag;
    public $news = [];

    public function mount($tag)
    {
        $this->tag = $tag;
        $this->fetchNews();
    }

    public function fetchNews()
    {
        // Fetch news where tags contain the clicked tag
        $this->news = News::where('tag', 'like', '%' . $this->tag . '%')->get();
    }

    public function render()
    {
        return view('livewire.frontend.news-by-tag');
    }
}
