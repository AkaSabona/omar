<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'omargamal@gmail.com'],
            [
                'name' => 'Welcome Omar !',
                'email' => 'omargamal@gmail.com',
                'password' => Hash::make('omargamal@gmail.com'),
                'email_verified_at' => now(),
            ]
        );
    }
}
