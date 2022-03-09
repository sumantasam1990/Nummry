@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3"><a class="fw-bold" href="{{ route('dashboard') }}"> Dashboard</a> > {{ $exp[0] }} to {{ $exp[0] }} > Time Progress > {{ $comparison->name }}</h2>
            </div>

        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row mb-4">
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '7-days']) }}"> 7 Days</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '2-weeks']) }}">2 Weeks</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '3-weeks']) }}">3 Weeks</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '1-months']) }}">1 Month</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '2-months']) }}">2 Months</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '3-months']) }}">3 Months</a></h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '4-months']) }}">4 Months</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '5-months']) }}">5 Months</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '6-months']) }}">6 Months</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '7-months']) }}">7 Months</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '8-months']) }}">8 Months</a></h4>
        </div>
        <div class="col-md-2">
            <h4 class="text-primary fs-3"><a href="{{ route('comp.time.progress.metrics', [$stat->id, '9-months']) }}">9 Months</a></h4>
        </div>

    </div>




</div>

@include('layouts.footer')
