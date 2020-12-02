<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
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
                'name' => 'Fadly Ihsan Andanny',
                'email' => 'fadlyihsanandanny@gmail.com',
                'password' => bcrypt('zdfia17052000'),
                'status' => 1,
            ],
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('password'),
                'status' => 1,
            ],
            [
                'name'      => 'user',
                'email'     => 'user@gmail.com',
                'password'  => bcrypt('password'),
                'status'  => 0,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
