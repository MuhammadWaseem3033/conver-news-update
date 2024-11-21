<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */

    use HasFactory,
        HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'meta_title',
        'meta_discription',
        'discription',
        'tag',
        'user_id',
        'category_id',
        'status',
        'views',
        'likes',
        'meta_keyword',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'tag' => 'array',
        'meta_keyword' => 'array',
    ];

    // Define relationship with user (author)

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // scop funtion
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Define relationship with category

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    // Define relationship with comments

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    // static methods like helper 

    public static function popularNews()
    {
        return self::with('category')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
    }

    public static function TrandingNews()
    {
        return self::where('created_at', '>=', now()->subDays(7)) // Last 7 days
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
    }

    public static function getNews(){
        return self::with('category')->where('status',1)->orderBy('id','desc')->get();
    }
}
