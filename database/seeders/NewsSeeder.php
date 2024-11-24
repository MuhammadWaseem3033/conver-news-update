<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $category = Category::first();

        News::create([
            'title' => 'Tech Innovation in 2024',
            'slug' => 'tech-innovation-2024',
            'discription' => 'Detailed article about tech innovations in 2024...',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status' => 0,
        ]);
    }
}
