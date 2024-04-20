<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'usr_name'  =>  "admin",
            'email'     =>  "admin@gmail.com",
            'password'  =>  bcrypt('12312311'),
            'usr_phone' => '085864296239',
            'usr_gender'=> "laki - laki",  
        ]);
        $admin->assignRole('admin');
    }
}
