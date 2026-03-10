<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Lukas Junkovic',
                'email' => 'lukas.junkovic@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Andrija Vulicevic',
                'email' => 'andrija.vulicevic@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Nikola Junkovic',
                'email' => 'nikola.junkovic@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Balsa Hajdukovic',
                'email' => 'balsa.hajdukovic@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Ivan Sibinovic',
                'email' => 'ivan.sibinovic@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Benamin Bambur',
                'email' => 'benamin.bambur@example.com',
                'password' => bcrypt('password'),
            ]
        ];

        foreach ($users as $user) {
            \App\Models\User::updateOrCreate(
                ['name' => $user['name']],
                ['email' => $user['email'], 'password' => $user['password']]
            );
        }
    }
}
