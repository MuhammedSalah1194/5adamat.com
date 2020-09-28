<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = User::create([
            'name'=>'admin',
            'email'=>'admin@app.com',
            'password'=>bcrypt('adminadmin'),
            'group'=>'admin',
        ]);
    }
}