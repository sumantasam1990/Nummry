@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3"><a class="text-primary fw-bold" href="{{ route('dashboard') }}"> Dashboard</a> > {{ $exp[0] }} to {{ $exp[0] }} Comparisons</h2>
            </div>

        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    @foreach($stats as $stat)

        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-normal">{{ $stat->title }}</h4> <hr style="width: 200px;">
            </div>
        </div>

        <div class="row mb-4">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card text-white border-primary border-3 mb-3 p-4">
                            <div class="card-body">
                                <h5 class="card-title fs-2">{{ $stat->metric_one }}</h5>
                                <h6 class="card-title fs-5">{{ $stat->metric_two }}</h6>
                            </div>
                        </div>
                    </a>
                    @if($stat->progress === 1)
                    <div class="text-center">
                        <a class="btn-link text-primary fw-light text-center" href="{{ route('comp.time.progress', [$stat->comparison_id, $stat->id]) }}">Progress</a>
                    </div>
                    @endif
                </div>
        </div>
    @endforeach

    @if(count($stats) === 0)
    <div class="row">
        <div class="col-12">
            No data found. Please check back later.
        </div>
    </div>
    @endif


</div>

@include('layouts.footer')
