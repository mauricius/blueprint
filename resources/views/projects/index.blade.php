@extends('common.template')

@section('heading')
    Projects
@endsection

@section('content')
    <div class="actions-container">
        <div class="btn-group pull-right" role="group">
            <a class="btn btn-primary btn-flat" href="{{ route('projects.create') }}">Create Project</a>
            <a class="btn btn-primary btn-flat" href="{{ route('uploads.index') }}">Show Uploads</a>
        </div>

        <div class="clearfix"></div>
    </div>

    <br>

    <div class="box box-primary">
        <div class="box-body no-padding">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></td>
                            <td>{{ $project->created_at }}</td>
                            <td>{{ $project->updated_at }}</td>
                            <td>
                                <a href="{{ route('projects.show', [$project->id]) }}">Show</a>
                                <a href="{{ route('projects.edit', [$project->id]) }}">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">
                                <h5 class="text-center text-muted">No Projects</h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $projects->links() !!}
        </div>
    </div>
@endsection
