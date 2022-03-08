@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2>View Stats</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-10 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Category</th>
                    <th>Comparison Name</th>
                    <th>Stats Title</th>
                    <th>Metric One</th>
                    <th>Metric Two</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                    <tr>
                        <td>{{ $stat->u_name }} {{ $stat->u_email }}</td>
                        <td>{{ $stat->comp_cate_title }}</td>
                        <td>{{ $stat->name }}</td>
                        <td>{{ $stat->stat_title }}</td>
                        <td>{{ $stat->metric_one }}</td>
                        <td>{{ $stat->metric_two }}</td>
                        <td>
                            @if($stat->progress === 1)
                            <p><a class="btn btn-secondary" href="{{ route('admin.progress.title', [$stat->stat_id]) }}">Add Progress Title</a></p>
                                <p><a class="btn btn-primary" href="{{ route('admin.view.progress.title', [$stat->stat_id]) }}">View Progress Title</a></p>
                            @else
                                <span class="text-danger">No Progress</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $stats->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
