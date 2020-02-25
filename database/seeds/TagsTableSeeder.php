<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //istruzione su come popolare il db
        //uso config per prend il file ('nomeFile.nomeChiave')
        $tags = config('tags.tag_db');
        //ciclo per creare e popolare ogni istanza
        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag['name'];
            $new_tag->slug = $tag['slug'];
            $new_tag->save();
        }
    }
}
