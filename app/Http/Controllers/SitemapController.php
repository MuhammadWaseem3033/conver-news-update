<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{   
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
                // 'priority' => '0.8',
                // 'title' => $newsItem->title,
                // 'frequency' => 'daily',
                'priority' => '',
                'title' => '',
                'frequency' => '',

                'images' => [
                    [
                        'url' => $baseUrl . '/storage/' . $newsItem->image,
                        'title' => $newsItem->title,
                    ],
                ],
                'meta_keyword' => $newsItem->meta_keyword ? explode(',', $newsItem->meta_keyword) : [],
                'lastmod' => $newsItem->updated_at
                    ? Carbon::parse($newsItem->updated_at)->toAtomString()
                    : now()->toAtomString(),
                'is_news' => true,
            ];
        })->toArray();

        // Combine all URLs
        // dd($newsUrls);
        $urls = array_merge($manualPages, $categoryUrls, $newsUrls);

        // Generate XML
        $sitemap = view('sitemap', compact('urls'));

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}
