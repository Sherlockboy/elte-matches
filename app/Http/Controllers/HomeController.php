<?php

namespace App\Http\Controllers;

use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'teams' => Team::all()
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
