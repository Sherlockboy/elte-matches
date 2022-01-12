<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitCommentRequest;
use App\Models\Comment;
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

    public function team($id)
    {
        return view('team', [
            'team' => Team::findOrFail($id)
                ->load(
                    'host_games.guest_team',
                    'guest_games.host_team',
                    'comments.user'
                )
        ]);
    }

    public function submit(SubmitCommentRequest $request)
    {
        try {
            Comment::create([
                'text' => $request->comment,
                'team_id' => $request->team_id,
                'user_id' => auth()->id()
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! Comment is not created!');
        }

        return back()->with('success', 'Comment successfully created!');
    }
}
