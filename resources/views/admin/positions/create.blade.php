@extends('admin.layouts.main')


@section('title', 'Dashboard')

@section('content_header')
    <h3>Create Position</h3>
@stop

@section('content')
    <x-alert />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-dark">Create Position</h3>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('admin.positions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Position Name:</label>
                    <div class="input-group text" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="name" class="form-control datetimepicker-input">
                    </div>
                    @error('name')
                        <div class=" text-danger text-sm">{{ $message }}</div>
                    @enderror
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
