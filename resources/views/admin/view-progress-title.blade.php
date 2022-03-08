@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2>View Progress Title</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-10 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>Progress Category</th>
                    <th>Progress Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($progress_titles as $progress_title)
                    <tr>
                        <td>{{ $progress_title->timeprogress_name }}</td>
                        <td>{{ $progress_title->title }}</td>
                        <td>
                            <p><a class="btn btn-secondary" href="{{ route('admin.add.progress.metrics', [$progress_title->id, $progress_title->stat_id]) }}">Add Progress Metrics</a></p>
                            <p><a class="btn btn-primary" href="{{ route('admin.view.progress.metrics', [$progress_title->id, $progress_title->stat_id]) }}">View Progress Metrics</a></p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $progress_titles->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
