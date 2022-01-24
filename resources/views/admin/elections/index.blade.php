@extends('adminlte::page')

@section('title', 'Elections')

@section('content_header')
    <h1>Elections</h1>
@stop

@section('content')
<x-alert/>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Elections</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="{{route('admin.elections.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Create Election
                        </a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($elections as $election)
                        <tr>
                            <td>{{$election->id}}</td>
                            <td>{{$election->name}}</td>
                            <td>{{$election->status}}</td>
                            <td>{{ date('d M Y h:i:s', strtotime($election->start));}}</td>
                            <td>{{ date('d M Y', strtotime($election->end));}}</td>
                            <td>
                              <a href="{{url("admin/elections/$election->id/edit")}}" class="btn btn-primary btn-sm text-white">
                                <i class="fa fa-pen"></i>
                              </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"> No Elections Set Yet!!</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@stop