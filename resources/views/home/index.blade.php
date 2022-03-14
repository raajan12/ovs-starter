@extends('home.layout')
@section('content')
    <div class="card  my-4">
        <div class="card-header">
            <h4 class="card-title">Ongoing Elections</h4>
        </div>
        <div class="card-body">
            <div class="list-group">
                @forelse ($elections->where('status', '0') as $election)
                    <a href="{{ url("/election/$election->id") }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $election->name }}</h5>
                            <small class="text-muted">Starts
                                {{ date('F j, Y, g:i a', strtotime($election->start)) }}</small>
                        </div>

                        <small class="text-muted"> {{ $election->candidates()->count() }} Candidates </small>
                    </a>
                @empty
                    <a class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">No election are running!</h5>
                        </div>

                    </a>
                @endforelse
            </div>
        </div>
    </div>
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Upcoming Elections</h4>
        </div>
        <div class="card-body">
            <div class="list-group">

                @forelse ($elections->where('status','-1') as $election)
                    <a href="{{ url("/election/$election->id") }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $election->name }}</h5>
                            <small class="text-muted">Starts
                                {{ date('F j, Y, g:i a', strtotime($election->start)) }}</small>
                        </div>

                        <small class="text-muted"> {{ $election->candidates()->count() }} Candidates </small>
                    </a>
                @empty
                    <a class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">No upcoming election!</h5>
                        </div>

                    </a>
                @endforelse
            </div>
        </div>
    </div>
@endsection
