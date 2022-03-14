@extends('admin.layouts.main')

@section('title', 'Positions')
@section('js')
    <script type="text/javascript">
        function deletePosition(id) {
            if (confirm(
                    'Are You sure you want to delete this Position? This will delete all candidates with this position too.'
                )) {
                document.querySelector('#delete-' + id).submit();
            }
        }
    </script>
@endsection

@section('content_header')
    <h3>Positions</h3>
@stop

@section('content')
    <x-alert />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Positions</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('admin.positions.create') }}" class="btn btn-success">
                                <i class="fa fa-plus"></i> Create Position
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($positions as $position)
                                <tr>
                                    <td>{{ $position->id }}</td>
                                    <td>{{ $position->name }}</td>
                                    <td>
                                        <a href="{{ url("admin/positions/$position->id/edit") }}"
                                            class="btn btn-primary btn-sm text-white">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" onclick="deletePosition({{ $position->id }})"
                                            class="btn btn-primary btn-sm text-white"><i class="fa fa-trash"></i></a>
                                        <form style="display:none" method="POST" id="delete-{{ $position->id }}"
                                            action="{{ route('admin.positions.destroy', $position->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"> No Positions Set Yet!!</td>
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
