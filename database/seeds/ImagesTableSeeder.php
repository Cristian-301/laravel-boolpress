<?php

use Illuminate\Database\Seeder;
use App\Image;
use Faker\Generator as Faker;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){

            $newImage = new Image();

            $newImage->link = $faker->imageUrl(640, 480, 'abstract');
            $newImage->alt = $faker->sentence(4);
            $newImage->caption = $faker->sentence(8);

            $newImage->save();

        }
    }
}
