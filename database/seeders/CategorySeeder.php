<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'description' => 'Latest tech news and articles.',
        ]);

        Category::create([
            'name' => 'Sports',
            'slug' => 'sports',
            'description' => 'Sports news and updates.',
        ]);

        Category::create([
            'name' => 'Politics',
            'slug' => 'politics',
            'description' => 'Political news and discussions.',
        ]);
    }
}
