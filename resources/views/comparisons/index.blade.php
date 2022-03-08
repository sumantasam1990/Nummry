@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3">Dashboard > {{ $exp[0] }} to {{ $exp[0] }} Comparisons</h2>
            </div>

        </div>
    </div>
</div>

<div class="container mt-6">

    @include('layouts.alert')

    @foreach($categories as $category)
        @php
        $comparisons = \App\Models\Comparison::whereCompCategoryId($category->id)->get();
        @endphp

    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-normal">{{ $category->title }}</h4> <hr style="width: 200px;">
        </div>
    </div>

    <div class="row mb-4">
        @foreach($comparisons as $comparison)
        <div class="col-md-3">
            <a href="{{ route('stats', [$comparison->id, $idd]) }}">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comparison->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    @endforeach



</div>

@include('layouts.footer')
