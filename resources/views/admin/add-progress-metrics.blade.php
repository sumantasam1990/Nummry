@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2>Add Progress Metrics</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.add.progress.metrics.post') }}" method="post">
                @csrf

                <input type="hidden" name="stat_id" value="{{ $stat_id }}">

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Choose Progress Title*</label>
                    <select class="form-control" name="title_id">
                        <option value="">Select</option>
                        @foreach($titles as $title)
                        <option value="{{ $title->id }}">{{ $title->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Metric One*</label>
                    <input type="text" name="m_one" class="form-control">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Metric Two*</label>
                    <input type="text" name="m_two" class="form-control">
                </div>


                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-dark btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
