@extends('admin.layouts.main')


@section('title', 'Dashboard')


@section('content')
    <x-alert />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-dark">Create Election</h3>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('admin.elections.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Election Name:</label>
                    <div class="input-group text" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="name" class="form-control datetimepicker-input">
                    </div>
                    @error('name')
                        <div class=" text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Election Starts</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="datetime-local" name="start" class="form-control datetimepicker-input">
                    </div>
                    @error('start')
                        <div class=" text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Election Status</label>
                    <div class="input-group">
                        <select class="form-control" name="status" id="">
                            <option value="-1" selected>Pending</option>
                            <option value="0" selected>Running</option>
                            <option value="1" selected>Ended</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
