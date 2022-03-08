@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2>Add Lessons</h2>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-6 mx-auto">
            <form action="{{ route('admin.add.lesson') }}" method="post">
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



                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-dark btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
