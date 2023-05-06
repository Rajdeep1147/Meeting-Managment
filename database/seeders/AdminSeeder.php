<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
           'name'=>'admin',
           'email'=>'admin@gmail.com', 
           'email_verified_at' => now(),
           'password' => bcrypt('password'), 

        ]);
        $user->assignRole('writer', 'admin');
    }
}
