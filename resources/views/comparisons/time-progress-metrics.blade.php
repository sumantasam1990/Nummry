@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3"><a class="fw-bold" href="{{ route('dashboard') }}"> Dashboard</a> > {{ $exp[0] }} to {{ $exp[0] }} > Time Progress > {{ $comparison->name }} > {{ $time }}</h2>
            </div>

        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    @foreach($stat_progress_title as $stat_title)
        @php
        $stat_progresses = \App\Models\StatProgress::whereStatProgressTitleId($stat_title->id)->get();
        @endphp

        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-normal">{{ $stat_title->title }}</h4> <hr style="width: 200px;">
            </div>
        </div>

        <div class="row mb-4">
            @foreach($stat_progresses as $stat_progress)
            <div class="col-md-3">
                <a href="#">
                    <div class="card text-white border-primary border-3 mb-3 p-4">
                        <div class="card-body">
                            <h5 class="card-title fs-2">{{ $stat_progress->metric_one }}</h5>
                            <h6 class="card-title fs-5">{{ $stat_progress->metric_two }}</h6>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    @endforeach

    @if(count($stat_progress_title) === 0)
        <p>No data found.</p>
    @endif


</div>

@include('layouts.footer')
