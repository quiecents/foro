<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $post = Post::inRandomOrder()->first();
        $comments = Comment::factory()
                        ->count(3)
                        ->for($post)
                        ->create();

        $firstComment = $comments->shift();

        $comments->each(function ($comment) use ($firstComment) {
            $comment->parent_id = $firstComment->id;
            $comment->save();
        });

        $post = Post::inRandomOrder()->first();
        $comments = Comment::factory()
                    ->count(3)
                    ->for($post)
                    ->create();

        $firstComment = $comments->shift();

        $comments->each(function ($comment) use ($firstComment) {
            $comment->parent_id = $firstComment->id;
            $comment->save();
        });
                    
        $post = Post::inRandomOrder()->first();
        $comments = Comment::factory()
                    ->count(3)
                    ->for($post)
                    ->create();

        $firstComment = $comments->shift();

        $comments->each(function ($comment) use ($firstComment) {
            $comment->parent_id = $firstComment->id;
            $comment->save();
        });

                    Comment::factory()
                    ->count(40)
                    ->create();
    }
}
