@extends('home.layout')
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">My Votes History</h4>
        </div>
        <div class="card-body">
            <div class="list-group">
                @forelse ($votes as $vote)
                    <a href="{{ url('/election/' . $vote->election->id) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Voted For {{ $vote->candidate->name }}
                                ({{ $vote->candidate->position->name }})
                            </h5>
                            <small class="text-muted">Voted
                                {{ $vote->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">
                            On {{ $vote->election->name }}
                        </p>

                    </a>
                @empty
                    <a class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">You have not voted anything!</h5>
                        </div>

                    </a>
                @endforelse
            </div>
        </div>
    </div>
@endsection
