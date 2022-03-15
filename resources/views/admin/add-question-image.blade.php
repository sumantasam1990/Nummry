@include('admin.navbar', ['title' => $title])

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2>Add Image Question</h2>

            <a class="btn btn-primary btn-lg mt-2" href="{{ route('admin.question.view', [$lid]) }}">View Questions</a> &nbsp;

            <a class="btn btn-secondary btn-lg mt-2" href="{{ route('admin.add.question', [$lid]) }}">Add Text Question</a>

        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-10 mx-auto">

            <form action="{{ route('admin.add.question.post.image') }}" method="post" enctype="multipart/form-data">
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
                            <label class="fw-bold mb-2">Main Question (Image)*</label>
                            <input type="file" name="main" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option One (Optional)</label>
                            <input type="file" name="one" class="form-control">
                            <span class="text-center">OR,</span>
                            <input type="text" name="one_txt" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option Two (Optional)</label>
                            <input type="file" name="two" class="form-control">
                            <span class="text-center">OR,</span>
                            <input type="text" name="two_txt" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option Three (Optional)</label>
                            <input type="file" name="three" class="form-control">
                            <span class="text-center">OR,</span>
                            <input type="text" name="three_txt" class="form-control">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Option Four (Optional)</label>
                            <input type="file" name="four" class="form-control">
                            <span class="text-center">OR,</span>
                            <input type="text" name="four_txt" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3 mt-3">
                            <label class="fw-bold mb-2">Correct Answer (Eg. 1/2/3/4)</label>
                            <select required name="correct" class="form-control">
                                <option value="">Select</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <small>Eg. If Option Two is correct, you should put 2 as a correct answer here.</small>
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

<script>
    function image()
    {
        var chk = $('#img').is(':checked');
        if(chk) {

        }
    }
</script>
