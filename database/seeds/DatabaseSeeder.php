<?php

use Illuminate\Database\Seeder;

use DB;

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
            'firstname' => 'Daniel' ,
            'lastname' => 'Uche',
            'email' => 'dank.uche@yahoo.com',
            'password' => '$2y$10$/9HRDehFUIc3vK5cPrAOo.uOZVLXCKiEEnFaN/zHvqyIZCJiqu1xG',
            'email_verified' => 1,
        ]);

        DB::table('roles')->insert([
            'name' => 'Company' ,
            'display_name' => 'compamy',
            'description' => 'company user'
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin' ,
            'display_name' => 'admin',
            'description' => 'company admin user'
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
