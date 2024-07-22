<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image', 'category_id', 'tag_id', 'user_id', 'author'];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

public function tags()
{
    return $this->belongsToMany(Tag::class);
}
public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = self::createSlug($post->title);
        });

        static::updating(function ($post) {
            if ($post->isDirty('title')) {
                $post->slug = self::createSlug($post->title);
            }
        });

        static::deleting(function ($post) {
            // Menghapus gambar utama
            if ($post->image) {
                Storage::delete(str_replace('storage/', 'public/', $post->image));
            }

            // Menghapus gambar di dalam konten
            $dom = new \DOMDocument();
            @$dom->loadHTML($post->content);
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                $path = parse_url($src, PHP_URL_PATH);
                $relativePath = 'public' . $path;
                Storage::delete($relativePath);
            }
        });
    }

    public static function createSlug($title)
    {
        return Str::slug($title, '-');
    }
    
}
