<?php

use Illuminate\Database\Seeder;
Use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        User::create([
        	'name' => 'ruairi',
        	'email' => 'admin@ruairimcnicholas.com',
        	'password'=> bcrypt('Unbroken1758')
        	]);
    }
}
