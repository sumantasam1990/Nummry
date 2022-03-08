@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2>View Lessons</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-8 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>#</th>
                    <th> Date</th>
                    <th>User</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>
                            @if($lesson->complete_status === 1)
                                Completed
                            @elseif($lesson->complete_status === 0)
                                Not-completed

                            @endif
                        </td>
                        <td>{{ date('F j, Y', strtotime($lesson->datetime)) }}</td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ $lesson->email }}</td>
                        <td>
                            <a href="{{ route('admin.question.view', [$lesson->lid]) }}" class="nav nav-link">View Questions</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $lessons->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
