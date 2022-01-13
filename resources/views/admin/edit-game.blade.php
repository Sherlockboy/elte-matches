@extends('layouts.app')

@section('content')
    <section>
        @includeIf('components.alerts')
        <div class="card">
            <div class="card-header">
                Edit Game Details
            </div>
            <div class="card-body">
                <form action="{{ route('game.update', $game->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="team_id" value="{{ $team_id }}">
                    <div class="row">
                        <div class="col">
                            <label for="host_score">{{ $game->host_team->name }}</label>
                            <input type="number" name="host_score" value="{{ $game->host_score() }}" class="form-control"
                                placeholder="Enter score">
                        </div>
                        <div class="col">
                            <label for="guest_score">{{ $game->guest_team->name }}</label>
                            <input type="number" name="guest_score" value="{{ $game->guest_score() }}"
                                class="form-control" placeholder="Enter score">
                        </div>
                        <div class="col">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ $game->created_at }}">
                        </div>
                        <div class="col-12 d-flex justify-content-end pt-2">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
