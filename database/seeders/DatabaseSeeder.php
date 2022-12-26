<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Disable foreign key constrains for users and enable it again
        Schema::disableForeignKeyConstraints();
        \App\Models\User::truncate();
        \App\Models\Role::truncate();
        \App\Models\Post::truncate();
        \App\Models\Tag::truncate();
        \App\Models\Comment::truncate();
        \App\Models\Category::truncate();
        \App\Models\Image::truncate();
        Schema::enableForeignKeyConstraints();

        // create roles and users
        \App\Models\Role::factory(1)->create();
        $users = \App\Models\User::factory(10)->create();

        foreach($users as $user){
            $user->image()->save(\App\Models\Image::factory()->make());
        }
        $posts = \App\Models\Post::factory(100)->create();
        \App\Models\Tag::factory(20)->create();
        \App\Models\Comment::factory(100)->create();
        \App\Models\Category::factory(10)->create();

        foreach($posts as $post){
            $tag_ids = [];

            $tag_ids[] = \App\Models\Tag::all()->random()->id;
            $tag_ids[] = \App\Models\Tag::all()->random()->id;
            $tag_ids[] = \App\Models\Tag::all()->random()->id;
            $tag_ids[] = \App\Models\Tag::all()->random()->id;

            $post->tags()->sync($tag_ids);
            $post->image()->save(\App\Models\Image::factory()->make());
        }

    }
}
