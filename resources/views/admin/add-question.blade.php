@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2>Add Question</h2>

            <a class="btn btn-primary btn-lg mt-2" href="{{ route('admin.question.view', [$lid]) }}">View Questions</a>

        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-10 mx-auto">
            <form action="{{ route('admin.add.question.post') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="lesson_id" value="{{ $lid }}">
                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Subject Name*</label>
                            <input type="text" name="subject" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Question Name*</label>
                            <input type="text" name="question" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Main Question*</label>
                            <textarea rows="3" class="form-control" name="main"></textarea>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option One (Optional)</label>
                            <input type="text" name="one" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option Two (Optional)</label>
                            <input type="text" name="two" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option Three (Optional)</label>
                            <input type="text" name="three" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option Four (Optional)</label>
                            <input type="text" name="four" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Correct Answer</label>
                            <input type="text" name="correct" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-dark btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
