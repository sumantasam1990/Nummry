@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3">{{ $exp[0] }}'s Dashboard</h2>
            </div>
            {{--            <div class="col-md-2">--}}
            {{--                <p>Current Group: 3</p>--}}
            {{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <p class="mt-2">Lesson Planner: Lara</p>--}}
{{--            </div>--}}
            @if(auth()->user()->user_type != 'teacher')
            <div class="col-md-3">
                <a class="btn btn-dark" href="{{ route('teacher.invitation') }}"><i class="fas fa-envelope"></i> Invite Tutor</a>
            </div>
            @endif
            <div class="col-md-3">
                <a class="btn btn-link text-danger" href="{{ route('signout') }}">Sign out </a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

{{--    Lessons--}}

    <div class="row">
        <div class="col-12">
            <h4 class="fw-normal">Lessons</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('lessons.not-complete', [$u_id]) }}">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Non-Completed</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('lessons.complete', [$u_id]) }}">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Completed</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

{{--    Tests--}}

    <div class="row mt-4">
        <div class="col-12">
            <h4 class="fw-normal">Tests</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('test.initial', [$u_id]) }}">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Initial</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('test.non-complete', [$u_id]) }}">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Non-Completed</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('test.complete', [$u_id]) }}">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Completed</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

{{--    Comparisons--}}

    <div class="row mt-4">
        <div class="col-12">
            <h4 class="fw-normal">Comparisons & Progress</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('comparisons', [$u_id]) }}">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        @php
                            $exp = explode(' ', auth()->user()->name);
                        @endphp
                        <h5 class="card-title">{{ $exp[0] }} to {{ $exp[0] }}</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

@include('layouts.footer')
