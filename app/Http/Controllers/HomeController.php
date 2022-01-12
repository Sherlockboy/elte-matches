<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'teams' => Team::withCount('comments')->get(),
            'games' => Game::latest('id')->limit(5)->with('host_team', 'guest_team')->get()
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
