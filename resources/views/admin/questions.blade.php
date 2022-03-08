@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2>View Questions > {{ date('F j, Y', strtotime($lesson->datetime)) }} > {{ $user->name }}</h2>

            <a class="btn btn-primary btn-lg mt-2" href="{{ route('admin.results.view', [$lesson->id]) }}">View Results</a>

            <a class="btn btn-secondary btn-lg mt-2" style="margin-left: 20px" href="{{ route('admin.add.question', [$lesson->id]) }}">Add Question</a>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-8 mx-auto">
            <table class="table table-bordered table-responsive mt-3">
                <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Question Name</th>
                    <th>Question</th>
                    <th>Option One</th>
                    <th>Option Two</th>
                    <th>Option Three</th>
                    <th>Option Four</th>
                    <th>Datetime</th>
{{--                    <th>Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->subject_name }}</td>
                        <td>{{ $question->question_name }}</td>
                        <td>{{ $question->question_main }}</td>
                        <td>{{ $question->q_one }}</td>
                        <td>{{ $question->q_two }}</td>
                        <td>{{ $question->q_three }}</td>
                        <td>{{ $question->q_four }}</td>
                        <td>{{ date('F j, Y', strtotime($question->created_at)) }}</td>
{{--                        <td>--}}
{{--                            <a href="{{ route('admin.question.view', [$question->id]) }}" class="nav nav-link">View Results</a>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $questions->links() }}
        </div>
    </div>
</div>

@include('layouts.footer')
