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
                'role' => 'Mahasiswa',
                'registration_number' => '0000001'
            ],
            'pengurus@mail.com' => [
                'role' => 'Pengurus',
                'registration_number' => '0000002'
            ],
            'admin@mail.com' => [
                'role' => 'Admin',
                'registration_number' => '0000003'
            ],
        ];

        foreach ($users as $key => $user) {
            $key = User::create([
                'registration_number' => $user['registration_number'],
                'name' => $user['role'],
                'email' => $key,
                'password' => bcrypt('password')
            ]);

            $key->assignRole($user['role']);
        };
    }
}
