@extends('admin.layouts.main')


@section('title', 'Edit Candidate')
@section('content')
    <x-alert />
    <div class="row">
        <div class="col p-4">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title text-dark">Edit Candidate</h3>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('admin.candidates.update', $candidate->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Candidate Name:</label>
                            <div class="input-group text" id="reservationdate" data-target-input="nearest">
                                <input value="{{ $candidate->name }}" type="text" name="name"
                                    class="form-control datetimepicker-input">
                            </div>
                            @error('name')
                                <div class=" text-danger text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Candidate Description:</label>
                            <div class="input-group text" id="reservationdate" data-target-input="nearest">
                                <input value="{{ $candidate->description }}" type="text" name="description"
                                    class="form-control datetimepicker-input">
                            </div>
                            @error('description')
                                <div class=" text-danger text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="position_id">Position</label>
                            <select name="position_id" name="position_id" id="position_id"
                                class="form-control @error('position') is-invalid @endif">
                                @forelse ($positions as $position)
                                    <option {{ $candidate->position_id == $position->id ? 'selected' : '' }}
                                        value="{{ $position->id }}">{{ $position->name }}</option>
                                @empty
                                    <option>No positions added yet</option>
                                @endforelse


                            </select>
                            @error('position')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="election_id">Running In Election</label>
                            <select name="election_id" name="election_id" id="election_id"
                                class="form-control @error('position') is-invalid @endif">
                                @forelse ($elections as $election)
                                    <option {{ $candidate->position_id == $position->id ? 'selected' : '' }}
                                        value="{{ $election->id }}">{{ $election->name }}</option>
                                @empty
                                    <option>No elections added yet</option>
                                @endforelse


                            </select>
                            @error('election')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="image">Upload Candidate Image</label>
                            <input type="file" accept="image/*" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror"
                                value="{{ old('image') ?? '' }}">
                            @error('image')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>




                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                Edit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
