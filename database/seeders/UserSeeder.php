<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new \App\Models\User;
        $newUser->name =  'Admin';
        $newUser->email = 'admin@gmail.com';
        $newUser->password = bcrypt('12345678');
        $newUser->save();
    }
}
