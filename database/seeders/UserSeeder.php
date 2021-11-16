<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'mahasiswa@mail.com' => [
                'role' => 'Mahasiswa'
            ],
            'pengurus@mail.com' => [
                'role' => 'Pengurus'
            ],
            'admin@mail.com' => [
                'role' => 'Admin'
            ],
        ];

        foreach ($users as $key => $user) {
            $key = User::create([
                'name' => $user['role'],
                'email' => $key,
                'password' => bcrypt('password')
            ]);

            $key->assignRole($user['role']);
        };
    }
}
