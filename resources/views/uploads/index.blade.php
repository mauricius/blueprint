@extends('common.template')

@section('heading')
    Uploads <small>({{ $uploads->count() }})</small>
@endsection

@section('content')

     <div class="box box-primary">
        <div class="box-body no-padding">
            @include('uploads.partials.table', ['uploads' => $uploads])
        </div>
    </div>

    <a href="{{ route('projects.index') }}" class="btn btn-flat btn-default">&larr; Back</a>

@endsection
