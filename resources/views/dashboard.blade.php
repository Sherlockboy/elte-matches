@extends('layouts.app')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>{{ __('Dashboard') }}</div>
                <div>
                    <a class="btn btn-primary" href="{{ route('index') }}">
                        Back to Home
                    </a>
                </div>
            </div>

            <div class="card-body row">
                @forelse (auth()->user()->teams as $team)
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <p class="card-text fw-bold">{{ $team->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('team', $team->id) }}"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{ route('team', $team->id) }}#comments" class="btn btn-sm btn-primary">
                                        Comments <span class="badge bg-secondary">{{ $team->comments_count }}</span>
                                    </a>
                                </div>
                                <a href="{{ route('un-mark-favorite', $team->id) }}"
                                    class="btn btn-outline-danger w-100 mt-2">
                                    Remove favorites
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-danger fw-bold">You don't have any favorite team!</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
