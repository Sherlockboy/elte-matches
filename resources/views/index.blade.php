@extends('layouts.app')

@section('content')
    @includeIf('components.alerts')
    <section>
        <h1>ELTE Football Matches Board</h1>
        <p class="fs-5 col-md-8">You can find match resultes, scheduled matches, comments on teams and many
            more. Enjoy using it!</p>

        <div class="mb-5">
            <a href="#" class="btn btn-primary btn-lg px-4">Results</a>
        </div>
    </section>
    <section>
        <h2 class="pb-2 border-bottom">Teams</h2>
        <div class="row">
            @foreach ($teams as $team)
                <div class="col-md-4">
                    <div class="card shadow-sm mb-3">
                        <svg class="bd-placeholder-img card-img-top rounded" xmlns="http://www.w3.org/2000/svg" role="img"
                            aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#{{ rand(100000, 999999) }}"></rect>
                        </svg>

                        <div class="card-body">
                            <p class="card-text fw-bold">{{ $team->name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                @auth
                                    @if (auth()->user()->is_admin)
                                        <div class="btn-group">
                                            <a href="{{ route('team', $team->id) }}"
                                                class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                    @endif
                                @endauth
                                @guest
                                    <a href="{{ route('team', $team->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                @endguest
                                <a href="{{ route('team', $team->id) }}#comments" class="btn btn-sm btn-primary">
                                    Comments <span class="badge bg-secondary">{{ $team->comments_count }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section>
        <h2 class="pb-2 border-bottom">Last 5 matches:</h2>
        <div class="row justify-content-center">
            @foreach ($games as $game)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex justify-content-center">
                            <div class="w-50 text-center me-2">
                                <div class="fw-bold">{{ $game->host_team->name }}</div>
                                <div
                                    class="px-2 py-1
                            @if ($game->is_draw())
                                badge bg-warning
                            @elseif ($game->is_host_won())
                                badge bg-success
                            @else
                                badge bg-danger
                            @endif">
                                    {{ $game->host_score() }}</div>
                            </div>
                            <div class="w-50 text-center ms-2">
                                <div class="fw-bold">{{ $game->guest_team->name }}</div>
                                <div
                                    class="px-2 py-1
                            @if ($game->is_draw())
                                badge bg-warning
                            @elseif ($game->is_guest_won())
                                badge bg-success
                            @else
                                badge bg-danger
                            @endif">
                                    {{ $game->guest_score() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
