@include('layouts.header', ['title' => $title])
<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3 fw-bold"><span class="text-primary">Dashboard</span> > Learning Exercises</h2>
            </div>


        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-12">
            <h4 class="fw-normal">Learning Exercises: Completed</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row mt-4">
        @foreach($lessons as $lesson)
            <div class="col-md-3">
                <a href="#">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ date('F j, Y', strtotime($lesson->datetime)) }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach


    </div>
</div>






@include('layouts.footer')

