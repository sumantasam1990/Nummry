@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2>Add Test</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.add.test.post') }}" method="post">
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
                    <label class="fw-bold mb-2">Date*</label>
                    <input type="date" name="date" class="form-control">
                </div>

                <div class="form-group mb-3 mt-3">
                    <label class="fw-bold mb-2">Date*</label>
                    <select class="form-control" name="status">
                        <option value="">Select</option>
                        <option value="3">Initial</option>
                        <option value="4">Not-completed</option>
                    </select>
                </div>



                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-dark btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
