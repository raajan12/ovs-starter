@extends('home.layout')
@section('content')

    <x-alert />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $election->name }}</h3>
        </div>
        <div class="card-body">
            <div class="text-muted">
                <table class="table">
                    <tr>
                        <td>
                            <p class="text-sm">Starts From
                                <b class="d-block">{{ date('F j, Y, g:i a', strtotime($election->start)) }}</b>
                            </p>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>

    @php
    $date = date('d.m.Y H:i');
    $match_date = date('d.m.Y H:i', strtotime($election->start));
    @endphp
    @if ($date <= $match_date && $election->status == -1)
        <div class="row">
            <div class="col p-5 m-5 bg-white">
                <h3> Election has not started yet!!</h3>
            </div>
        </div>
    @elseif($date >= $match_date && $election->status == 0)
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
                                    @php
                                        $uvote = auth()
                                            ->user()
                                            ->votes->where('election_id', $election->id)
                                            ->where('position_id', $pname->id);
                                    @endphp

                                    <li class="list-group-item d-flex justify-content-between">
                                        <img src="https://ui-avatars.com/api/?name={{ $candidate->name }}" width="30"
                                            class="rounded-circle mx-2" alt="">
                                        @if ($uvote->where('candidate_id', $candidate->id)->count() != 0)
                                            (Voted)
                                            {{ $candidate->name }}
                                        @else
                                            {{ $candidate->name }}
                                        @endif



                                        @if ($uvote->count() == 0)
                                            <button {{ !$election->status ? '' : 'disabled' }}
                                                class="btn btn-success btn-sm mx-2" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $candidate->id }}">Vote</button>
                                        @else
                                            <button disabled class="btn btn-sm mx-2 btn-success"> Voted </button>
                                        @endif


                                    </li>

                                    <div class="modal fade" id="exampleModal{{ $candidate->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Vote Confirmation for
                                                        {{ $pname->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('voteByUser') }}">
                                                    @csrf
                                                    <input type="hidden" name="candidate_id"
                                                        value="{{ $candidate->id }}">
                                                    <input type="hidden" name="election_id" value="{{ $election->id }}">
                                                    <input type="hidden" name="position_id" value="{{ $pname->id }}">
                                                    <div class="modal-body">
                                                        <p>You have selected {{ $candidate->name }} as
                                                            {{ $pname->name }}
                                                            ,To confirm your selection please enter your password.
                                                        </p>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Enter Your
                                                                Password</label>
                                                            <input type="password" name="userpass" class="form-control"
                                                                id="password" placeholder="your login password">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Vote</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @elseif($date >= $match_date && ($election->status = 1))
        <div class="row">
            <h4 class="p-2 m-2 mx-auto text-center ">Election Results</h4>
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
                                        <div class="bg-warning text-white p-1 rounded">
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
    @else
        <div class="row">
            <div class="col p-5 m-5 bg-white">
                <h3> Election is Awaiting!!</h3>
            </div>
        </div>
    @endif
@endsection
