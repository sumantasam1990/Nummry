@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2>View Comparisons</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-8 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Comparison Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comparisons as $comparison)
                    <tr>
                        <td>{{ $comparison->title }}</td>
                        <td>{{ $comparison->name }}</td>
                        <td>
                            <a href="{{ route('admin.view.stats', [$comparison->id]) }}" class="nav nav-link">View Stats</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $comparisons->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
