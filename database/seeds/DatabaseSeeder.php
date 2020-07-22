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
        \App\Role::insert([
       'name'=>'Admin',
       'slug'=>'admin'
       ]);
       \App\Role::insert([
        'name'=>'Author',
        'slug'=>'author'
        ]);


       \App\User::insert([
            'name' => ' Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       \App\User::insert([
            'name' => ' Author',
            'username' => 'author',
            'email' => 'author@author.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



    }
}
