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
        	'id' => 1,
            'name' => 'admin',
            'username' => 'admin',
            'role' => 'superadmin',
           	'position' => 'President',
           	'email' => 'admin@admin.com',
           	'password' => bcrypt('adminadmin')
    	]);

    	DB::table('users')->insert([
        	'id' => 2,
            'name' => 'nica',
            'username' => 'nica',
            'role' => 'admin',
            'position' => 'Vice President',
           	'email' => 'nica@nica.com',
           	'password' => bcrypt('nicanica')
    	]);
    }
}
