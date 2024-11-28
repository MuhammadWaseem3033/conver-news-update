<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory,
        HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }



    // Define relationship with articles
    public function news()
    {
        return $this->hasMany(News::class);
    }

    // Parent category relationship

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    // Subcategories relationship
    public function subcategories()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // static mathod 

    public static function getCategory(){
        return self::with('news')
        ->has('news')
        ->get();
    }
    
    public static function getCategoryPage(){
        return self::with('subcategories')
        ->where('parent_id',null)       
        ->get()
        ->toArray();
    }
}
