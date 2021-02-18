<?php

use Illuminate\Database\Seeder;
use App\InfoPost;
use App\Post; // <--- colleghiamo gli InfoPosts ai Post che abbiamo già nel DB
use Faker\Generator as Faker;

class InfoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        //per ogni post devi creare una nuova entita
        foreach($posts as $post) {

            //creazione istanza InfoPost
            $newInfoPost = new InfoPost();

            //valorizzo le proprietà
            $newInfoPost->post_id = $post->id;
            $newInfoPost->post_status = $faker->randomElement(['public', 'private', 'draft']);
            $newInfoPost->comment_status = $faker->randomElement(['open', 'private', 'closed']);

            //salvo i dati
            $newInfoPost->save();
        }
    }
}
