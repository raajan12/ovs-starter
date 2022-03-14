@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <x-alert />
    <div class="row">
        <div class="col p-4 m-2 order-1 order-md-2 bg-white">
            <h3 class="text-primary">{{ $election->name }}</h3>
            <br>
            <div class="text-muted">
                <p class="text-sm">Starts From
                    <b class="d-block">{{ date('F j, Y, g:i a', strtotime($election->start)) }}</b>
                </p>

            </div>

            <h5 class="mt-5 text-muted">Candidates</h5>


        </div>
    </div>
    <div class="row">
        @foreach ($election->candidates->groupBy('position_id') as $position => $candidates)
            <div class="col-lg-6 p-2 ">
                <div class="card m-1">
                    <div class="card-header">
                        @php
                            $pname = App\Models\Position::find($position);
                        @endphp
                        <h4 class="card-title">{{ $pname->name }}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($candidates as $candidate)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        {{ $candidate->name }}
                                    </div>
                                    <div class="bg-success p-1 rounded">
                                        {{ $candidate->votes->where('election_id', $election->id)->count() }} Votes
                                    </div>

                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@stop
