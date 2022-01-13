<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;

class AdminController extends Controller
{
    public function edit_game($team_id, $game_id)
    {
        return view('admin.edit-game', [
            'game' => Game::findOrFail($game_id)->load('host_team', 'guest_team'),
            'team_id' => $team_id
        ]);
    }

    public function update_game(GameUpdateRequest $request, int $id)
    {
        Game::findOrFail($id)->update([
            'score' => implode(':', [$request->host_score, $request->guest_score]),
            'created_at' => $request->date
        ]);

        return redirect("/team/{$request->team_id}");
    }
}
