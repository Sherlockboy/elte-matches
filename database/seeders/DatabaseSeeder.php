<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Elte-Stadium Admin',
                'email' => 'admin@eltestadium.hu',
                'password' => Hash::make('admin'),
                'is_admin' => true
            ],
            [
                'name' => 'Jack',
                'email' => 'jack@eltestadium.hu',
                'password' => Hash::make('user'),
            ],
            [
                'name' => 'Alex',
                'email' => 'alex@eltestadium.hu',
                'password' => Hash::make('user'),
            ],
            [
                'name' => 'Barry',
                'email' => 'barry@eltestadium.hu',
                'password' => Hash::make('user'),
            ],
            [
                'name' => 'Soliev',
                'email' => 'soliev@eltestadium.hu',
                'password' => Hash::make('soliev'),
            ]
        ];
        
        foreach($users as $user) {
            User::create($user);
        }
    }
}
