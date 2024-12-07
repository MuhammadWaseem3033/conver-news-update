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
        $TagCategories,
        $popularNews,
        $TrandingNews,
        $allTags;

    // public function mount($id)
    // {
    //     // dd($id);
    //     $this->currentCategory = Category::find($id);
    //     // dd($this->currentCategory->parent_id);

    //     if ($this->currentCategory->parent_id == null) {
    //         // If subcategory, get its parent and siblings
    //         $this->categories = Category::whereNull('parent_id')
    //             ->with(
    //                 [
    //                     'subcategories',
    //                     'news'
    //                     => function ($query) {
    //                         $query->active();
    //                     }
    //                 ]
    //             )
    //             ->has('news')
    //             ->where('id', $this->currentCategory->id)
    //             ->get();

    //         $this->subcategories = Category::where(
    //             [
    //                 'id' => $this->currentCategory->id,
    //                 'parent_id' => $this->currentCategory->parent_id
    //             ]
    //         )
    //             ->with(
    //                 [
    //                     'news' => function ($query) {
    //                         $query->active();
    //                     }
    //                 ]
    //             )
    //             ->get();
    //     } else {


    //         $this->categories = Category::where('id', $this->currentCategory->parent_id)
    //             ->with(
    //                 [
    //                     'subcategories',
    //                     'news'
    //                     => function ($query) {
    //                         $query->active();
    //                     }
    //                 ]
    //             )
    //             ->has('news')
    //             // ->where('category_id', $this->currentCategory->id)
    //             ->get();

    //         $this->subcategories = $this->currentCategory
    //             ->subcategories
    //             ->load(
    //                 [
    //                     'news' => function ($query) {
    //                         $query->active(); // Filter news with status 1
    //                     }
    //                 ]
    //             );
    //         dd($this->categories);
    //     }

    //     // for populer news 
    //     $this->popularNews = News::popularNews();
    //     $this->TrandingNews = News::TrandingNews();
    //     view()->share('title', $this->currentCategory->name);
    //     view()->share('metatitle', $this->currentCategory->meta_title);
    //     view()->share('keywords', $this->currentCategory->meta_keyword);
    //     view()->share('description', $this->currentCategory->description);


    //     $this->allTags = getUniqueTags($this->categories);
    // }
    public function mount($id)
    {
        $this->currentCategory = Category::find($id);

        if ($this->currentCategory->parent_id == null) {           
            $this->categories = Category::whereNull('parent_id')
                ->with([
                    'subcategories',
                    'news' => function ($query) {
                        $query->active();
                    }
                ])
                ->has('news') 
                ->where('id', $this->currentCategory->id)
                ->get();

            $this->subcategories = $this->currentCategory->subcategories->load([
                'news' => function ($query) {
                    $query->active(); 
                }
            ]);
            
        } else {          
            $this->categories = Category::where('id', $this->currentCategory->parent_id)
                ->with([
                    'subcategories',
                    'news' => function ($query) {
                        $query->active(); 
                    }
                ])
                ->get();

            $this->subcategories = Category::where('id', $this->currentCategory->id)
                ->with([
                    'news' => function ($query) {
                        $query->active(); 
                    }
                ])
                ->get();
        }

        // Fetch popular and trending news
        $this->popularNews = News::popularNews();
        $this->TrandingNews = News::TrandingNews();

        // Set meta information for SEO
        view()->share('title', $this->currentCategory->name);
        view()->share('metatitle', $this->currentCategory->meta_title);
        view()->share('keywords', $this->currentCategory->meta_keyword);
        view()->share('description', $this->currentCategory->description);

        // Unique tags for this category
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
