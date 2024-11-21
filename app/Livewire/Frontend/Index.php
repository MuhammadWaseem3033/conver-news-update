<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class Index extends Component
{
    public
        $Categories,
        $PopularNews,
        $TrandingNews,
        $LatestNews,
        $allTags;

    public function mount()
    {
        $this->Categories = Category::getCategory();
        $this->PopularNews = News::popularNews();
        $this->TrandingNews = News::TrandingNews();
        $this->LatestNews = News::getNews();
        $this->allTags = getUniqueTags($this->Categories);
    }


    public function render()
    {
        return view('livewire.frontend.index');
    }
}
