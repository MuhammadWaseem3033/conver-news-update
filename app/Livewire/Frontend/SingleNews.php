<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class SingleNews extends Component
{
    public
        $SingleNews,
        $popularNews,
        $TrandingNews,
        $allTags,
        $categories;

    public function mount($slug)
    {
        $this->SingleNews = News::where('slug', $slug)->get()->first();
        $this->popularNews = News::popularNews();
        $this->TrandingNews = News::TrandingNews();

        view()->share('title', $this->SingleNews->title);
        view()->share('metatitle', $this->SingleNews->meta_title);
        view()->share('keywords', $this->SingleNews->meta_keyword);
        view()->share('description', $this->SingleNews->meta_discription);

        $this->incrementView($this->SingleNews->id);
        $this->categories = Category::getCategory();

        $this->allTags = getUniqueTags($this->categories);
    }

    public function incrementView($id)
    {
        $viewedNews = session()->get('viewed_news', []);

        if (!in_array($id, $viewedNews)) {
            $this->SingleNews->increment('views');
            session()->push('viewed_news', $id);
        }
    }

    public function render()
    {
        return view('livewire.frontend.single-news');
    }
}
