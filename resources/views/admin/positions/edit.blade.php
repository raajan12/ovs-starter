@extends('admin.layouts.main')

@section('title', 'Dashboard')
@section('content')
    <x-alert />
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-dark">Edit Position</h3>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('admin.positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Position Name:</label>
                    <div class="input-group text" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="name" class="form-control datetimepicker-input"
                            value="{{ $position->name }}">
                    </div>
                    @error('name')
                        <div class=" text-danger text-sm">{{ $message }}</div>
                    @enderror
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
