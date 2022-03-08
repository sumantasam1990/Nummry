@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="fs-3">Teacher's Dashboard</h2>
            </div>
            <div class="col-md-3">

            </div>
            <div class="col-md-3">
                <a class="btn btn-link text-danger" href="{{ route('signout') }}">Sign out</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    {{--    Lessons--}}

    <div class="row">
        <div class="col-12">
            <h4 class="fw-normal">Students/Parents</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row">
        @foreach($students as $student)
        <div class="col-md-3">
            <a href="{{ route('dashboard', [$student->uid]) }}">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

@include('layouts.footer')
