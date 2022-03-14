@extends('admin.layouts.main')

@section('title', 'Dashboard')


@section('content')
    <h3>Dashboard</h3>
    <hr>
    <div class="p-2">
        <div class=" d-flex flex-row justify-start  flex-wrap">
            <div class="p-4 m-2 rounded shadow  d-flex flex-column">
                <i class="fa fa-users p-2 align-middle"></i>
                <b>Total Elections</b>
                <span>{{ $elections->count() }}</span>
            </div>
            <div class="p-4 m-2 rounded shadow  d-flex flex-column">
                <i class="fa fa-users p-2 align-middle"></i>
                <b>Total Positions</b>
                <span>{{ $positions->count() }}</span>
            </div>
            <div class="p-4 m-2 rounded shadow  d-flex flex-column">
                <i class="fa fa-users p-2 align-middle"></i>
                <b>Running Elections</b>
                <span>{{ $elections ? $elections->where('status', '0')->count() : 0 }}</span>
            </div>
            <div class="p-4 m-2 rounded shadow  d-flex flex-column">
                <i class="fa fa-users p-2 align-middle"></i>
                <b>Ended Elections</b>
                <span>{{ $elections ? $elections->where('status', '1')->count() : 0 }}</span>
            </div>

        </div>
    </div>
    {{-- list of recent elections --}}
    <div class="p-2 my-4">
        <h4>Recent Elections</h4>
        <ol class="list-group list-group-numbered">
            @foreach ($elections as $election)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $election->name }}</div>
                        @php
                            switch ($election->status) {
                                case 0:
                                    echo 'Running';
                                    break;
                                case 1:
                                    echo 'Ended';
                                    break;
                                default:
                                    echo 'Not Initiated';
                            }
                        @endphp
                    </div>
                    <span class="badge bg-primary rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="{{ $election->start }}">
                        {{ \Carbon\Carbon::parse($election->start)->diffForHumans() }}</span>
                </li>
            @endforeach
        </ol>
    </div>
@stop
