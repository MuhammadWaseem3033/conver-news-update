<?php

use Illuminate\Support\Collection;

if (!function_exists('getUniqueTags')) {
    /**
     * Get unique tags from categories with news.
     *
     * @param Collection $categories
     * @return Collection
     */
    function getUniqueTags(Collection $categories): Collection
    {
      
        return $categories
            ->flatMap(function ($category) {
                return $category->news->pluck('tag');
            })
            ->filter()
            ->flatMap(function ($tag) {
                return explode(',', $tag);
            })
            ->map(function ($tag) {
                return trim($tag);
            })
            ->unique();
    }
}
