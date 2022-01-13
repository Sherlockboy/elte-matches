@extends('layouts.app')

@section('content')
    <section>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="https://upload.wikimedia.org/wikipedia/en/a/af/ELTE_logo.png"
                        class="img-fluid rounded-start p-2" alt="...">
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">{{ $team->name }}</h4>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At repellendus
                            odio ab adipisci sapiente inventore perspiciatis ut. Quam consequatur neque, laudantium nemo
                            adipisci sint! Architecto quia porro neque accusantium officiis!</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h3 class="mb-2">Host matches</h3>
        <div class="card mb-3">
            <div class="card-body">
                @foreach ($team->host_games as $game)
                    <div class="alert 
                    @if ($game->is_draw())
                        alert-warning
                    @elseif($game->is_host_won())
                        alert-success
                    @else
                        alert-danger
                    @endif mb-2"
                        role="alert">
                        <div class="d-flex justify-content-center align-items-center position-relative">
                            <div class="w-50 text-end me-5">
                                <div>{{ $team->name }}</div>
                                <div class="fw-bold">{{ $game->host_score() }}</div>
                            </div>
                            <div class="w-50 text-start ms-5">
                                <div>{{ $game->guest_team->name }}</div>
                                <div class="fw-bold">{{ $game->guest_score() }}</div>
                            </div>
                            @auth
                                @if (auth()->user()->is_admin)
                                    <div class="position-absolute end-0">
                                        <a
                                            href="{{ route('game.edit', ['team_id' => $team->id, 'game_id' => $game->id]) }}">edit</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <h3 class="mb-2">Guest matches</h3>
        <div class="card mb-3">
            <div class="card-body">
                @foreach ($team->guest_games as $game)
                    <div class="alert 
                    @if ($game->is_draw())
                        alert-warning
                    @elseif($game->is_guest_won())
                        alert-success
                    @else
                        alert-danger
                    @endif mb-2"
                        role="alert">
                        <div class="d-flex justify-content-center align-items-center position-relative">
                            <div class="w-50 text-end me-5">
                                <div>{{ $game->host_team->name }}</div>
                                <div class="fw-bold">{{ $game->host_score() }}</div>
                            </div>
                            <div class="w-50 text-start ms-5">
                                <div>{{ $team->name }}</div>
                                <div class="fw-bold">{{ $game->guest_score() }}</div>
                            </div>
                            @auth
                                @if (auth()->user()->is_admin)
                                    <div class="position-absolute end-0">
                                        <a
                                            href="{{ route('game.edit', ['team_id' => $team->id, 'game_id' => $game->id]) }}">edit</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="comments">
        @includeIf('components.alerts')
        <h3 class="mb-2">Comments</h3>
        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="pb-2 mb-2 border-bottom">Write Comment</h5>
                    @auth
                        <form action="{{ route('submit') }}" method="post" class="row">
                            @csrf
                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <div class="col-12 mb-2">
                                <textarea class="form-control" id="comment" name="comment" rows="3"
                                    placeholder="Your comment..."></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    @endauth
                    @guest
                        <div class="alert alert-danger" role="alert">
                            Please <a href="{{ route('login') }}">login</a> to write a comment!
                        </div>
                    @endguest
                </div>
                @foreach ($team->comments->sortByDesc('created_at') as $comment)
                    <div class="d-flex text-muted pb-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#{{ rand(100000, 999999) }}"></rect>
                        </svg>

                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">@ {{ $comment->user->name }}</strong>
                                <span>{{ $comment->created_at->format('Y-m-d') }} |
                                    {{ $comment->created_at->format('H:i') }}</span>
                            </div>
                            <span class="d-block">{{ $comment->text }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
