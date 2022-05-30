<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        // create demo users

        $user  = User::create([
            'name' => 'Lansia',
            'email' => 'a@gmail.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user->assignRole('lansia');

        $user  = User::create([
            'name' => 'pembimbing',
            'email' => 'b@gmail.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user->assignRole('pembimbing');

        $user  = User::create([
            'name' => 'pimpinan',
            'email' => 'c@gmail.com',
            'password' => bcrypt('adminadmin'),
        ]);
        $user->assignRole('pimpinan');
    }
}
