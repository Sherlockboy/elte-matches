<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elte Matches</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @includeIf('components.navbar')

        <main class="py-4 col-lg-8 mx-auto p-3 py-md-5">
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
                                <svg class="bd-placeholder-img card-img-top rounded" xmlns="http://www.w3.org/2000/svg"
                                    role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice"
                                    focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#{{ rand(100000, 999999) }}"></rect>
                                </svg>

                                <div class="card-body">
                                    <p class="card-text fw-bold">{{ $team->name }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        @auth
                                            @if (auth()->user()->is_admin)
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                                                    <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                </div>
                                            @endif
                                        @endauth
                                        @guest
                                            <a href="#" class="btn btn-sm btn-outline-secondary">View</a>
                                        @endguest
                                        <a href="#comments" class="text-muted fw-normal">Comments:
                                            {{ $team->comments_count }}</a>
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
        </main>
    </div>
</body>

</html>
