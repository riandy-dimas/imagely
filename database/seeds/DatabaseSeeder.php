<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dimas',
            'email' => 'dimas@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
