<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'PHP',
            'Laravel',
            'Javascript',
            'HTML',
            'CSS'
        ];

        foreach($tags as $tag) {
            // CREAZIONE ISTANZA
            $newTags = new Tag();

            // ASSEGNAZIONE VALORI
            $newTags->name = $tag;
            $newTags->slug = Str::slug($tag);

            // SALVATAGGIO
            $newTags->save();
        }
        

    }
}
