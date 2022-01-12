<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function host_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'host_team_id');
    }

    public function guest_team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'guest_team_id');
    }

    public function host_score(): int
    {
        return explode(':', $this->score)[0];
    }

    public function guest_score(): int
    {
        return explode(':', $this->score)[1];
    }

    public function is_host_won(): bool
    {
        $scores = explode(':', $this->score);
        
        return $scores[0] > $scores[1];
    }

    public function is_guest_won(): bool
    {   
        return !$this->is_host_won();
    }

    public function is_draw(): bool
    {
        $scores = explode(':', $this->score);
        
        return $scores[0] == $scores[1];
    }
}
