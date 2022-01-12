<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Team;
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
        // Creating users
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

        // Creating teams
        $teams = [
            [
                'name' => 'FC Barcelona'
            ],
            [
                'name' => 'Real Madrid'
            ],
            [
                'name' => 'ElteHub'
            ],
            [
                'name' => 'Manchester United'
            ],
            [
                'name' => 'Liverpool'
            ],
            [
                'name' => 'Juventus F.C'
            ],
            [
                'name' => 'Chelsea'
            ],
            [
                'name' => 'Milan'
            ]
        ];

        foreach($teams as $team) {
            Team::create($team);
        }

        // Creating favorite teams
        User::whereIn('id', [1,5])->get()->each(function($user) {
            $user->teams()->sync([2,3,5]);
        });

        // Creating comments
        $comments = [
            [
                'text' => 'A football team represents a way of being, a culture.',
                'team_id' => 3,
                'user_id' => 1
            ],
            [
                'text' => 'A football team is a like a beautiful woman, when you do not tell her, she forgets she is beautiful.',
                'team_id' => 3,
                'user_id' => 5
            ] ,
            [
                'text' => 'A good football team plays offense and defense. You have to be aggressive and disrupt.',
                'team_id' => 3,
                'user_id' => 2
            ]  
        ];

        foreach($comments as $comment) {
            Comment::create($comment);
        }
    }
}
