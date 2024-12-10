<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    // public function index()
    // {
    //     $baseUrl = URL::to('/');

    //     $categories = DB::table('categories')->select('slug', 'id', 'updated_at')->get();
    //     $news = DB::table('news')->select('title','slug', 'image', 'updated_at')->get();
    //     $newsPages = DB::table('news')->get();


    //     $manualPages = [
    //         [
    //             'url' => $baseUrl . '/',
    //             'priority' => '1.0',
    //             'type' => 'webpage',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //         [
    //             'url' => $baseUrl . '/about-us',
    //             'priority' => '0.9',
    //             'type' => 'webpage',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //         [
    //             'url' => $baseUrl . '/contact-us',
    //             'priority' => '0.9',
    //             'type' => 'webpage',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //         [
    //             'url' => $baseUrl . '/privacy-and-policy',
    //             'priority' => '0.9',
    //             'type' => 'webpage',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //         [
    //             'url' => $baseUrl . '/terms-and-conditions',
    //             'priority' => '0.9',
    //             'type' => 'webpage',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //     ];
    //     // Combine all URLs
    //     $urls = array_merge(
    //         $manualPages,
    //         // `/news/{slug?}/{id}`
    //         $categories->map(function ($category) use ($baseUrl) {
    //             return [
    //                 'url' => $baseUrl . '/news/' . $category->slug . '/' . $category->id,
    //                 'priority' => '0.8',
    //                 'type' => 'category',
    //                 'frequency' => 'weekly',
    //                 'images' => [],                    
    //                 'lastmod' => $category->updated_at
    //                     ? Carbon::parse($category->updated_at)->toAtomString()
    //                     : now()->toAtomString(),
    //             ];
    //         })->toArray(),
    //         // `/news/{slug}`
    //         $newsPages->map(function ($newsPage) use ($baseUrl) {
    //             return [
    //                 'url' => $baseUrl . '/news/',
    //                 'priority' => '0.8',
    //                 'type' => 'news',
    //                 'frequency' => 'daily',
    //                 'images' => [],
    //                 'lastmod' => $newsPage->updated_at
    //                     ? Carbon::parse($newsPage->updated_at)->toAtomString()
    //                     : now()->toAtomString(),
    //             ];
    //         })->toArray(),

    //         $news->map(function ($newsItem) use ($baseUrl) {
    //             return [
    //                 'url' => $baseUrl . '/news/' . $newsItem->slug,
    //                 'priority' => '0.8',
    //                 'type' => 'news',
    //                 'title' => $newsItem->title,
    //                 'frequency' => 'daily',
    //                 'images' => [
    //                     [
    //                         'url' => $baseUrl . '/storage/' . $newsItem->image, // Assuming `image_path` contains image URL relative to base path
    //                         'title' => $newsItem->slug, // Use slug as image title
    //                     ],
    //                 ],                    
    //                 'lastmod' => $newsItem->updated_at
    //                     ? Carbon::parse($newsItem->updated_at)->toAtomString()
    //                     : now()->toAtomString(),
    //             ];
    //         })->toArray(),

    //     );

    //     // Generate XML
    //     $sitemap = view('sitemap', compact('urls'));

    //     return response($sitemap, 200)
    //         ->header('Content-Type', 'application/xml');
    // }
    // public function index()
    // {
    //     $baseUrl = URL::to('/');

    //     // Fetch data from database
    //     $categories = DB::table('categories')->select('name','slug', 'id', 'updated_at')->get();
    //     $news = DB::table('news')->select('title', 'slug', 'image', 'updated_at')->get();
    //     $newsPages = DB::table('news')->get();

    //     // Manual static pages
    //     $manualPages = [
    //         [
    //             'url' => $baseUrl . '/',
    //             'priority' => '1.0',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //         [
    //             'url' => $baseUrl . '/about-us',
    //             'priority' => '0.9',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //         [
    //             'url' => $baseUrl . '/contact-us',
    //             'priority' => '0.9',
    //             'frequency' => 'daily',
    //             'images' => [],
    //             'lastmod' => now()->toAtomString(),
    //         ],
    //     ];
    //     // Generate categories URLs
    //     $categoryUrls = $categories->map(function ($category) use ($baseUrl) {
    //         return [
    //             'url' => $baseUrl . '/news/' . $category->slug . '/' . $category->id,
    //             'priority' => '0.8',                
    //             'frequency' => 'weekly',
    //             'images' => [],
    //             'lastmod' => $category->updated_at
    //                 ? Carbon::parse($category->updated_at)->toAtomString()
    //                 : now()->toAtomString(),
    //             'title' => '' . $category->name, // Title for category
    //         ];
    //     })->toArray();

    //     // Generate news URLs
    //     $newsUrls = $news->map(function ($newsItem) use ($baseUrl) {
    //         return [
    //             'url' => $baseUrl . '/news/' . $newsItem->slug,
    //             'priority' => '0.8',               
    //             'title' => $newsItem->title, // Title for news
    //             'frequency' => 'daily',
    //             'images' => [
    //                 [
    //                     'url' => $baseUrl . '/storage/' . $newsItem->image, // Assuming `image` path is correct
    //                     'title' => $newsItem->title, // Use news title for image title
    //                 ],
    //             ],
    //             'lastmod' => $newsItem->updated_at
    //                 ? Carbon::parse($newsItem->updated_at)->toAtomString()
    //                 : now()->toAtomString(),
    //         ];
    //     })->toArray();

    //     // Combine all URLs
    //     $urls = array_merge($manualPages, $categoryUrls, $newsUrls);

    //     // Generate XML
    //     $sitemap = view('sitemap', compact('urls'));

    //     return response($sitemap, 200)
    //         ->header('Content-Type', 'application/xml');
    // }
    public function index()
    {
        $baseUrl = URL::to('/');

        // Fetch data from database
        $categories = DB::table('categories')->select('name', 'slug', 'id', 'updated_at')->get();
        $news = DB::table('news')->select('title', 'slug', 'image', 'meta_keyword', 'updated_at')->get();

        // Manual static pages
        $manualPages = [
            [
                'url' => $baseUrl . '/',
                'priority' => '1.0',
                'frequency' => 'daily',
                'images' => [],
                'lastmod' => now()->toAtomString(),
                'is_news' => false,
            ],
            [
                'url' => $baseUrl . '/about-us',
                'priority' => '0.9',
                'frequency' => 'daily',
                'images' => [],
                'lastmod' => now()->toAtomString(),
                'is_news' => false,
            ],
            [
                'url' => $baseUrl . '/contact-us',
                'priority' => '0.9',
                'frequency' => 'daily',
                'images' => [],
                'lastmod' => now()->toAtomString(),
                'is_news' => false,
            ],
        ];

        // Generate categories URLs
        $categoryUrls = $categories->map(function ($category) use ($baseUrl) {
            return [
                'url' => $baseUrl . '/news/' . $category->slug . '/' . $category->id,
                'priority' => '0.8',
                'frequency' => 'weekly',
                'images' => [],
                'lastmod' => $category->updated_at
                    ? Carbon::parse($category->updated_at)->toAtomString()
                    : now()->toAtomString(),
                'is_news' => true, // Indicate this is a news entry
                'title' => $category->name,
            ];
        })->toArray();

        // Generate news URLs
        $newsUrls = $news->map(function ($newsItem) use ($baseUrl) {
            return [
                'url' => $baseUrl . '/news/' . $newsItem->slug,
                'priority' => '0.8',
                'title' => $newsItem->title,
                'frequency' => 'daily',
                'images' => [
                    [
                        'url' => $baseUrl . '/storage/' . $newsItem->image,
                        'title' => $newsItem->title,
                    ],
                ],
                'meta_keyword' => $newsItem->meta_keyword ? explode(',', $newsItem->meta_keyword) : [],
                'lastmod' => $newsItem->updated_at ,
                    // ? Carbon::parse($newsItem->updated_at)->toAtomString()
                    // : now()->toAtomString(),
                'is_news' => true, 
            ];
        })->toArray();

        // Combine all URLs
        $urls = array_merge($manualPages, $categoryUrls, $newsUrls);
        // dd($urls);

        // Generate XML
        $sitemap = view('sitemap', compact('urls'));

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}
