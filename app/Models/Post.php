<?php

namespace App\Models;

// use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'author_id'];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    // public static function getAll() : array
    // {
    //     return [
    //         [
    //             'id' => 1,
    //             'title' => 'Fikir Eske Mekabr',
    //             'content' => 'Like the wise Dr. Kebede Michael said...'
    //         ],
    //         [
    //             'id' => 2,
    //             'title' => 'Ke Admas Bashager',
    //             'content' => 'Like the wise Mr. Bealu Girma said...'
    //         ],
    //         [
    //             'id' => 3,
    //             'title' => 'Ye Wend Mt',
    //             'content' => 'Like the wise Yismaeke Worku said said...'
    //         ],
    //     ];
    // }

    // public static function getById(int $id): array
    // {
    //     $post = Arr::first(self::getAll(), fn($post) => $post['id'] == $id);
    //     if (! $post) {
    //         abort(404);
    //     }
    //     return $post;
    // }
}
