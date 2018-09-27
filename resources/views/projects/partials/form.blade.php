{!! Form::textField('name', 'Name') !!}
{!! Form::textareaField('description', 'Description') !!}

{!! Form::submitButton('Save') !!}

<a href="{{ route('projects.index') }}" class="btn btn-flat btn-default">&larr; Back</a>

{!! Form::close() !!}
