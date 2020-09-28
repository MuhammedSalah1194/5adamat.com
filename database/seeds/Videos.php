<?php

use App\Models\Video;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = Faker::create();

        $youtube = [
            'https://www.youtube.com/watch?v=LKKxvqdkzeg',
            'https://www.youtube.com/watch?v=oSrqQUE3Vvchttps://www.youtube.com/watch?v=jasYJbS8Z7c',
            'https://www.youtube.com/watch?v=rhsFjlDGC1s'
        ];

        $ids = [1,2,3,4,5,6,7,8,9];

        $images = [
            '1600475337iy6OaoEZ7x.jpg',
            '1600475430lHNRQ6Vs4y.jpg',
            ];

        for ($i=0; $i < 10; $i++) { 

            $array = [
                'name'=>$faker->word,
                'keywords'=>$faker->name,
                'meta_desc'=>$faker->name,
                'desc'=>$faker->paragraph,
                'youtube'=>$youtube[rand(0,2)],
                'published'=>rand(0,1),
                'cat_id'=>1,
                'user_id'=>1,
                'image'=>$images[rand(0,1)],
            ];
            
            $video = Video::create($array);
            $video->skills()->sync(array_rand($ids, 2));
            $video->tags()->sync(array_rand($ids, 2));
        }
    }
}