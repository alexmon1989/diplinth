<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Александр',
            'email' => 'alex.mon1989@gmail.com',
            'password' => bcrypt('123OLOLO123'),
        ]);

        User::create([
            'name' => 'Любомир',
            'email' => 'diplinth@ukr.net',
            'password' => bcrypt('admin123qwe'),
        ]);
    }
}
