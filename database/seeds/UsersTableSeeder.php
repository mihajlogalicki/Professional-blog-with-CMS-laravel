<?php

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
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users
        DB::table('users')->insert([

        [
            'name' => 'Jova Jovic',
            'email' => 'jova@gmail.com',
            'password' => bcrypt('123')
        ],

        [
            'name' => 'Steva Stevic',
            'email' => 'mark@gmail.com',
            'password' => bcrypt('123')
        ],

        [
            'name' => 'Mihajlo Galicki',
            'email' => 'miha@gmail.com',
            'password' => bcrypt('123')
        ],

        ]);
    }
}
