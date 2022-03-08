@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2>Add Comparison</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.comparison.post') }}" method="post">
                @csrf
                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Select a User*</label>
                    <select name="user" class="form-control">
                        <option value="">Select</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Comparison Category*</label>
                    <select name="category" class="form-control" onchange="ajax_call(this.value)">
                        <option value="">Select</option>
                        @foreach($comparison_cates as $comparison_cate)
                            <option value="{{ $comparison_cate->id }}">{{ $comparison_cate->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="comp" class="form-group mb-3 mt-3"></div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Title*</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Metric One*</label>
                    <input type="text" name="m_one" class="form-control">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Metric Two*</label>
                    <input type="text" name="m_two" class="form-control">
                </div>

                <div class="form-switch mb-3 mt-3">
                    <input type="checkbox" name="progress" value="1" class="form-check-input">
                    <label class="fw-bold mb-2 form-check-label">Progress</label>
                </div>


                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-dark btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')

<script type="text/javascript">
    function ajax_call(str) {
        $.ajax({
            url: '{{ route('admin.ajax.comparison.post') }}',
            type: "post",
            data: { "_token": "{{ csrf_token() }}", "str": str },
            success: function(res) {
                $("#comp").html(res.html);
            }
        });
    }
</script>
