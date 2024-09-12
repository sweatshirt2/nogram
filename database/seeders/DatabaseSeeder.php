<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $authors = Author::factory(10)->create();
        $posts = [];
        foreach ($authors as $author) {
            $quantity = random_int(1, 10);
            // $quantity = rand(1, 6); -> is not encrypted (cryptographically secure) randomizer
            for ($i = 0; $i < $quantity; $i++) {
                $posts[] = Post::factory()->create(['author_id'=> $author->id]);
            }
        }
        foreach ($posts as $post) {
            $quantity = random_int(0, 6);
            $author_id = random_int(1, 10);
            for ($i = 0; $i < $quantity; $i++) {
                Comment::factory()->create(['post_id'=> $post->id, 'author_id'=> Author::find($author_id)->id]);
            }
        }
    }
}
