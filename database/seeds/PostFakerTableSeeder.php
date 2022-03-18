<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PostFakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Post::truncate();
        for ($i=0; $i < 30; $i++) { 
            $post=new Post();
            $post->title=$faker->text(10);
            $post->content=$faker->paragraph();
            $post->user_id=1;
            $slug=Str::slug($post->title);
            $exists= Post::where("slug",$slug)->first();
            $counter=1;
            while ($exists) {
                $newSlug=$slug . "-" . $counter;
                $counter++;
                $exists=Post::where("slug",$slug)->first();
                if (!$exists) {
                    $slug=$newSlug;
                }
            }
            $post->slug=$slug;
            $post->save();
        }
    }
}
