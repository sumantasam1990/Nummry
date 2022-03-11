@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2>Users List</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-8 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>User Type</th>
                    <th>Child's Name</th>
                    <th>Parent's Name</th>
                    <th>Child's Grade</th>
                    <th>Email</th>
                    <th>Promo Code</th>
                    <th>Referral Code</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ date('F j, Y', strtotime($user->created_at)) }}</td>
                        <td>{{ ($user->user_type == 'teacher' ? 'Teacher' : 'parent/Kid') }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->parent_name }}</td>
                        <td>{{ $user->grade }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->promo }}</td>
                        <td>{{ $user->referral }}</td>
{{--                        <td>--}}
{{--                            <a href="{{ route('admin.question.view', [$lesson->lid]) }}" class="nav nav-link">View Questions</a>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
