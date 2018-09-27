@extends('common.template')

@section('heading')
    Showing Project : {{ $project->name }}
@stop

@section('content')

    <div class="well">
        {{ $project->description }}
    </div>

    <p><b>Project Created At:</b> <i>{{ $project->created_at }}</i></p>

    <hr>

    <h3>Upload a new file</h3>

    {!! Form::open(['url' => route('projects.upload', $project->id), 'files' => true]) !!}

    {!! Form::file('file') !!}

    {!! Form::submitButton('Upload') !!}

    {!! Form::close() !!}

    <hr>

    <h3>Files Attached</h3>

    <div class="box box-primary">
        <div class="box-body no-padding">
            @include('uploads.partials.table', ['uploads' => $project->uploads])
        </div>
    </div>

    <a href="{{ route('projects.index') }}" class="btn btn-flat btn-default">&larr; Back</a>
@stop
