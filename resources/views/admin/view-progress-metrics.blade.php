@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2>View Progress Metrics</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-10 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>Progress Metric One</th>
                    <th>Progress Metric Two</th>
                </tr>
                </thead>
                <tbody>
                @foreach($metrics as $metric)
                    <tr>
                        <td>{{ $metric->metric_one }}</td>
                        <td>{{ $metric->metric_two }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $metrics->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
