<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Users that liked this team
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    
    public function host_games(): HasMany
    {
        return $this->hasMany(Game::class, 'id', 'host_team_id');
    }

    public function guest_games(): HasMany
    {
        return $this->hasMany(Game::class, 'id', 'host_team_id');
    }

    /**
     * @return relationship
     * Eager loading does not work this function,
     * instead you can use ->with('host_games', 'guest_games')
    */
    public function games(): Collection
    {
        return $this->host_games->merge($this->guest_games);
    }
}
