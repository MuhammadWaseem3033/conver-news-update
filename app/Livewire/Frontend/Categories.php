<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class Categories extends Component
{
    public
        $currentCategory,
        $categories,
        $subcategories,
        $popularNews,
        $TrandingNews,
        $allTags;

    public function mount($id)
    {

        $this->currentCategory = Category::find($id);

        // dd($this->currentCategory->parent_id);
        if ($this->currentCategory->parent_id) {
            // If subcategory, get its parent and siblings
            $this->categories = Category::whereNull('parent_id')
                ->with(
                    [
                        'subcategories',
                        'news'
                        => function ($query) {
                            $query->active();
                        }
                    ]
                )
                ->has('news')
                ->where('id', $this->currentCategory->id)
                ->get();

            $this->subcategories = Category::where(
                [
                    'id' => $this->currentCategory->id,
                    'parent_id' => $this->currentCategory->parent_id
                ]
            )
                ->with(
                    [
                        'news' => function ($query) {
                            $query->active();
                        }
                    ]
                )
                ->get();
        } else {
            // If parent category, get its subcategories
            $this->categories = Category::whereNull('parent_id')
                ->with(
                    [
                        'subcategories',
                        'news'
                        => function ($query) {
                            $query->active();
                        }
                    ]
                )
                ->has('news')
                ->where('id', $this->currentCategory->id)
                ->get();

            $this->subcategories = $this->currentCategory
                ->subcategories
                ->load(
                    [
                        'news' => function ($query) {
                            $query->active(); // Filter news with status 1
                        }
                    ]
                );
        }

        // for populer news 
        $this->popularNews = News::popularNews();
        $this->TrandingNews = News::TrandingNews();
        view()->share('title', $this->currentCategory->name);
        view()->share('metatitle', $this->currentCategory->meta_title);
        view()->share('keywords', $this->currentCategory->meta_keyword);
        view()->share('description', $this->currentCategory->description);

        $this->allTags = getUniqueTags($this->categories);
    }

    public function render()
    {

        return view(
            'livewire.frontend.categories',
            [
                'categories' => $this->categories,
                'subcategories' => $this->subcategories,
            ]
        );
    }
}
