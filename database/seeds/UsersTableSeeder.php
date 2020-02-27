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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'applocumadmin@yopmail.com',
            'password' => bcrypt('Password@123'),
        ]);
        DB::table('users')->insert([
            'name' => 'User Manager',
            'email' => 'usermanager@yopmail.com',
            'password' => bcrypt('Password@123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Shop Manager',
            'email' => 'shopmanager@yopmail.com',
            'password' => bcrypt('Password@123'),
        ]);
    }
}
