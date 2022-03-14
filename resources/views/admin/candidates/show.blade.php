@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('content_header')
    <h1>Candidate</h1>
@stop

@section('content')
    <x-alert />
    <div>
        {{ $candidate->name }}
        <hr>
        <p>{{ $candidate->description }}</p>
    </div>
@stop
