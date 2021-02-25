<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            // creiamo una nuova istanza 
            $newPost = new Post();

            //aggiungiamo i dati fake
            $newPost->title = $faker->sentence(7);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->subtitle = $faker->sentence(14);
            $newPost->text = $faker->text(7000);
            $newPost->author = $faker->name;
            $newPost->img_path = $faker->imageUrl(640, 480, 'city');
            $newPost->publication_date = $faker->dateTime();

            // salviamo i dati
            $newPost->save();

        }
    }
}
