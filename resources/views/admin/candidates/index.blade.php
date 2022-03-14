@extends('admin.layouts.main')


@section('title', 'Candidates')


@section('js')
    <script type="text/javascript">
        function deleteCandidate(id) {
            if (confirm('Are You sure you want to delete this Candidate? ')) {
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
                    <h3 class="card-title">List of Candidates</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('admin.candidates.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Create Candidate
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
                                <th>Position</th>
                                <th>On Election</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($candidates as $candidate)
                                <tr>
                                    <td>{{ $candidate->id }}</td>
                                    <td>{{ $candidate->name }}</td>
                                    <td>{{ $candidate->position->name }}</td>
                                    <td>{{ $candidate->election->name }}</td>
                                    <td>
                                        <a href="{{ url("admin/candidates/$candidate->id/edit") }}"
                                            class="btn btn-primary btn-sm text-white">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" onclick="deleteCandidate({{ $candidate->id }})"
                                            class="btn btn-primary btn-sm text-white"><i class="fa fa-trash"></i></a>
                                        <form style="display:none" method="POST" id="delete-{{ $candidate->id }}"
                                            action="{{ route('admin.candidates.destroy', $candidate->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"> No Candidates Set Yet!!</td>
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
