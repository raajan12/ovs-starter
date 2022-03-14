@extends('admin.layouts.main')


@section('title', 'Dashboard')


@section('content')
    <x-alert />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-dark">Edit Election</h3>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('admin.elections.update', $election->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Election Name:</label>
                    <div class="input-group text" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="name" class="form-control datetimepicker-input"
                            value="{{ $election->name }}">
                    </div>
                    @error('name')
                        <div class=" text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Election Starts</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input value="{{ date('Y-m-d\TH:i', strtotime($election->start)) }}" type="datetime-local"
                            name="start" class="form-control datetimepicker-input">
                    </div>
                    @error('start')
                        <div class=" text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Election Status</label>
                    <div class="input-group">

                        <select class="form-control" name="status" id="">

                            <option {{ $election->status == -1 ? 'selected' : '' }} value="-1">Pending</option>
                            <option {{ $election->status == 0 ? 'selected' : '' }} value="0">Running</option>
                            <option {{ $election->status == 1 ? 'selected' : '' }} value="1">Ended</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
