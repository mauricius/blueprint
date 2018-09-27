<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>Filename</th>
            <th>Extension</th>
            <th>Original Filename</th>
            <th>Mime Type</th>
            <th>Size</th>
            <th>Uploaded At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($uploads as $upload)
            <tr>
                <td><a href="{{ $upload->url }}">{{ $upload->filename }}</a></td>
                <td>{{ $upload->extension }}</td>
                <td>{{ $upload->original_filename }}</td>
                <td>{{ $upload->mimetype }}</td>
                <td>{{ $upload->size }}</td>
                <td>{{ $upload->created_at }}</td>
                <td>
                    <a href="{{ $upload->url }}">Download</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100%">
                    <h5 class="text-center text-muted">No files uploaded yet</h5>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>