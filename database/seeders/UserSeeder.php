<?php

namespace Database\Seeders;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'id' => 1,
            'name' => 'Islam',
            'email' => 'islam.walied96@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'role_id' => UserRoleEnum::Admin,
        ];
        User::create($admin);
    }
}
