@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2>Add Progress Title</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.progress.title.post') }}" method="post">
                @csrf

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Choose Category*</label>
                    <select class="form-control" name="cate">
                        <option value="">Select</option>
                        <option>7-days</option>
                        <option>2-weeks</option>
                        <option>3-weeks</option>
                        <option>1-months</option>
                        <option>2-months</option>
                        <option>3-months</option>
                        <option>4-months</option>
                        <option>5-months</option>
                        <option>6-months</option>
                        <option>7-months</option>
                        <option>8-months</option>
                        <option>9-months</option>
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Title*</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <input type="hidden" name="stat_id" value="{{ $stat_id }}">

{{--                <div class="form-group mb-3 mt-3">--}}
{{--                    <label class="fw-bold mb-2">Metric One*</label>--}}
{{--                    <input type="text" name="m_one" class="form-control">--}}
{{--                </div>--}}

{{--                <div class="form-group mb-3 mt-3">--}}
{{--                    <label class="fw-bold mb-2">Metric Two*</label>--}}
{{--                    <input type="text" name="m_two" class="form-control">--}}
{{--                </div>--}}


                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-dark btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
