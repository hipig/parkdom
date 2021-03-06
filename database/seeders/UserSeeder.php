<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::forceCreate([
            'name' => 'admin',
            'email' => 'admin@admin.test',
            'password' => 'password',
            'timezone' => 'Asia/Shanghai',
            'locale' => 'en',
            'role' => User::ROLE_ADMIN
        ]);
        $user->markEmailAsVerified();
    }
}
