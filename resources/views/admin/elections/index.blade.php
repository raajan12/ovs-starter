@extends('admin.layouts.main')

@section('title', 'Elections')

@section('content_header')
    <h3>Elections</h3>
@stop
@section('js')
    <script type="text/javascript">
        function deleteElection(id) {
            if (confirm(
                    'Are You sure you want to delete this Election? This will delete all candidates related to this elections '
                )) {
                document.querySelector('#delete-' + id).submit();
            }
        }
    </script>
@endsection
@section('content')
    <x-alert />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Elections</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('admin.elections.create') }}" class="btn btn-success">
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
                                    <td>{{ $election->id }}</td>
                                    <td>{{ $election->name }}</td>
                                    <td>{{ $election->status }}</td>
                                    <td>{{ date('d M Y h:i:s', strtotime($election->start)) }}</td>
                                    <td>
                                        <a href="{{ url("admin/elections/$election->id/edit") }}"
                                            class="btn btn-primary btn-sm text-white">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ url("admin/elections/$election->id") }}"
                                            class="btn btn-primary btn-sm text-white">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" onclick="deleteElection({{ $election->id }})"
                                            class="btn btn-primary btn-sm text-white"><i class="fa fa-trash"></i></a>
                                        <form style="display:none" method="POST" id="delete-{{ $election->id }}"
                                            action="{{ route('admin.elections.destroy', $election->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
