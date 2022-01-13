@extends('layouts.app')

@section('content')
    <section>
        <h1>ELTE Football Matches History</h1>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    @foreach ($games as $game)
                        <div class="col-md-6 mb-3">
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
                                <div class="w-100 text-muted text-center mt-1">
                                    {{ $game->created_at->format('H:i') . ' | ' . $game->created_at->format('d-m-Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
