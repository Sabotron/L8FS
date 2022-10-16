<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        $user= User::factory()->create();

        $personal = Category::create([
            'name'=> 'Personal',
            'slug'=> 'personal'
        ]);

        $family = Category::create([
            'name'=> 'Family',
            'slug'=> 'family'
        ]);

        $work = Category::create([
            'name'=> 'Work',
            'slug'=> 'work'
        ]);

        $hobby = Category::create([
            'name'=> 'Hobbies',
            'slug'=> 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'Family Post',
            'slug' => 'family post',
            'excerpt' => 'excerpt of family post',
            'body' => 'toda la hablada del post family...'

        ]);

        
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'Work Post',
            'slug' => 'work post',
            'excerpt' => 'excerpt of work post',
            'body' => 'toda la hablada del post work...'

        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'Hobbies Post',
            'slug' => 'hobbies post',
            'excerpt' => 'excerpt of hobbies post',
            'body' => 'toda la hablada del post hobbies...'

        ]);
    }
}
