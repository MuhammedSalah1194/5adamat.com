<?php

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
        $this->call([
            UsersTableSeeder::class,
            Categories::class,
            Skills::class,
            Tags::class,
            Videos::class,
            Comments::class
        ]);
    } 
}
