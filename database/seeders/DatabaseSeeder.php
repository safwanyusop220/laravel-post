<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        User::truncate();
//        Post::truncate();
//        Category::truncate();

        $user = User::factory()->create([
           'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory(10)->create();

//        $user = User::factory()->create();

//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);
//
//        $family =  Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $family->id,
//            'title' => 'My Family Post',
//            'slug'  => 'my-first-post',
//            'excerpt'=> 'Lorem ipsum dolar sit amet',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $work->id,
//            'title' => 'My work Post',
//            'slug'  => 'my-work-post',
//            'excerpt'=> 'Lorem ipsum dolar sit amet',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>'
//        ]);

    }
}
