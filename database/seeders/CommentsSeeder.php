<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $article = News::first();

        Comments::create([
            'news_id' => $article->id,
            'user_id' => $user->id,
            'comment' => 'Great article on tech innovations!',
        ]);
    }
}
