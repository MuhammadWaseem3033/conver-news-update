<?php

// use App\Livewire\Frontend\Category;

use App\Http\Controllers\SitemapController;
use App\Livewire\Frontend\AboutUS;
use App\Livewire\Frontend\Categories;
use App\Livewire\Frontend\CategoryPage;
use App\Livewire\Frontend\Contact;
use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\Index;
use App\Livewire\Frontend\NewsByTag;
use App\Livewire\Frontend\NewsPage;
use App\Livewire\Frontend\Privacyandpolicy;
use App\Livewire\Frontend\SingleNews;
use App\Livewire\Frontend\TermAndCondition;
use App\Livewire\NotFound;
use App\Models\TermAndConditions;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::fallback(NotFound::class);
//     function () {
//     return redirect('/'); // Redirect to home page
//     // Or to show the custom 404 page:
//     // return response()->view('errors.404', [], 404);
// });

Route::get('/', Index::class)->name('index');
Route::get('/news/{slug?}/{id}', Categories::class)->name('category');
Route::get('/news/{slug}', CategoryPage::class)->name('category.all');
Route::get('/news', NewsPage::class)->name('all.news');
Route::get('/single-news/{slug}',SingleNews::class)->name('single.news');

Route::get('/contact-us',Contact::class)->name('contect.us');
Route::get('/about-us',AboutUS::class)->name('about.us');
Route::get('/privacy-and-policy',Privacyandpolicy::class)->name('privacy.and.policy');
Route::get('/terms-and-conditions',TermAndCondition::class)->name('terms.conditions');

Route::get('/tags/{tag}', NewsByTag::class)->name('news.byTag');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
// require __DIR__ . '/frontend.php';