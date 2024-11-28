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

        view()->share('title','Home | latest news , updated news , breaking news , world news');
        view()->share('metatitle', '');
        view()->share('keywords', 'breaking news, latest news, pakistan news , US news , world news');
        view()->share('description', 'The Cover News Update - latest news and breaking news about Pakistan, world, sports, cricket, business, entertainment, weather, education, lifestyle; opinion & blog , with 24 x 7 updates');
        $this->allTags = getUniqueTags($this->Categories);
    }


    public function render()
    {
        return view('livewire.frontend.index');
    }
}
