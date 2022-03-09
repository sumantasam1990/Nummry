@include('layouts.header', ['title' => $title])
<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3 fw-bold"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard</a> > Tests</h2>
            </div>


        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">
        <div class="col-12">
            <h4 class="fw-normal">Test Completed</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row mt-4">
        @foreach($tests as $test)
            <div class="col-md-3">
                <a href="#">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ date('F j, Y', strtotime($test->datetime)) }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach


    </div>
</div>






@include('layouts.footer')

