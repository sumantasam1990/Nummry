<script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    $(function(){
        $("#frm_details").on("submit", function(event) {
            event.preventDefault();

            var hours = getCookie('hours');
            var minutes = getCookie('minutes');
            var seconds = getCookie('seconds');

            var hms = hours + ':' + minutes + ':' + seconds;   // your input string

            var formData = {
                "_token": "{{ csrf_token() }}",
                'hd_q_id': $('input[name=hd_q_id]').val(),
                'less_id': $('input[name=less_id]').val(),
                'ans': $('input[name=ans]').val(),
                'mcq': $("input[type='radio'][name='ans']:checked").val(),
                'time': hms
            };

            $.ajax({
                url: '{{ route('submit_answer') }}',
                type: "post",
                data: formData,
                success: function(d) {
                    if(d.redirect){
                        window.location.href=d.redirect;
                    } else {
                        if(d.correct) {
                            $("#correct").show(function () {
                                setTimeout( function () {
                                        $("#html").html(d.html);
                                    }, 2000
                                );

                            });
                        } else {
                            $("#incorrect").show(function () {
                                setTimeout( function () {
                                        $("#html").html(d.html);
                                    }, 2000
                                );
                            });
                        }

                    }
                }
            });
        });
    });

</script>


<script>

    function pause_timer_ajax() {
        $.ajax({
            url: '{{ route('pause.timer.ajax') }}',
            type: "post",
            data: { "_token": "{{ csrf_token() }}", "str_u": "{{ auth()->user()->id }}", "str_l": "{{ $question->lesson_id }}", "question_id": "{{ $question->id }}" },
            success: function(res) {
                window.location.href=res.pr;
                // $("#resume_time").show();
                // $("#pause_time").hide();
            }
        });
    }

    function resume_timer_ajax() {
        $.ajax({
            url: '{{ route('resume.timer.ajax') }}',
            type: "post",
            data: { "_token": "{{ csrf_token() }}", "str_u": "{{ auth()->user()->id }}", "str_l": "{{ $question->lesson_id }}", "question_id": "{{ $question->id }}" },
            success: function(res) {
                window.location.href=res.pr;
                // $("#resume_time").hide();
                // $("#pause_time").show();
            }
        });
    }
</script>

<div class="row">
<div class="col-md-3 text-center">
    <h2>{{ $question->subject_name }}</h2>
    <h4 class="mt-4">{{ $question->question_name }}</h4>
</div>
<div class="col-md-9 question-box text-center">
        <form id="frm_details" name="frm_details" method="post">

                    @csrf
                    <p class="p">
                        @if($question->q_one == '')
                            {{ $question->question_main }}

                        @else
                            @if($question->q_image > 0)
                                <a target="_blank" href="{{ asset('uploads/' . $question->question_main) }}"><img class="img-fluid" style="" src="{{ asset('uploads/' . $question->question_main) }}"></a>
                    @else
                        {{ $question->question_main }}
                    @endif

                    <div class="row mt-6 mb-4">
                        <div class="col-md-3">

                            @if($question->q_image === 1)
                                <input type="radio" name="ans" value="1">
                                <a target="_blank" href="{{ asset('uploads/' . $question->q_one) }}"><img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_one) }}"></a>
                            @else
                                <input type="radio" name="ans" value="1">
                                {{ $question->q_one }}
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if($question->q_image === 1)
                                <input type="radio" name="ans" value="2">
                                <a target="_blank" href="{{ asset('uploads/' . $question->q_two) }}"><img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_two) }}"></a>
                            @else
                                <input type="radio" name="ans" value="2">
                                {{ $question->q_two }}
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if($question->q_image === 1)
                                <input type="radio" name="ans" value="3">
                                <a target="_blank" href="{{ asset('uploads/' . $question->q_three) }}"><img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_three) }}"></a>
                            @else
                                <input type="radio" name="ans" value="3">
                                {{ $question->q_three }}
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if($question->q_image === 1)
                                <input type="radio" name="ans" value="4">
                                <a target="_blank" href="{{ asset('uploads/' . $question->q_four) }}"><img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_four) }}"></a>
                            @else
                                <input type="radio" name="ans" value="4">
                                {{ $question->q_four }}
                            @endif
                        </div>
                    </div>

                    @endif

                    </p>


                    <input type="hidden" class="@error('hd_q_id') is-invalid @enderror" name="hd_q_id" value="{{ $question->id }}">
                    <input type="hidden" class="@error('less_id') is-invalid @enderror" name="less_id" value="{{ $question->lesson_id }}">

                    @if($question->q_one == '')
                        <div class="form-group mb-4">
                            <input type="text" autocomplete="off" name="ans" class="form-control @error('ans') is-invalid @enderror">
                            @if ($errors->has('ans'))
                                <span class="text-danger">{{ $errors->first('ans') }}</span>
                            @endif
                        </div>
                    @endif


                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary btn-lg mb-4">Submit</button>

                            <p id="correct" style="background: #eee; padding: 6px; display: none;" class="fs-2 text-success fw-bold"> <i class="bi bi-check2"></i> Correct</p>

                            <p id="incorrect" style="background: #eee; padding: 6px; display: none;" class="fs-2 text-danger fw-bold"><i class="bi bi-x-circle"></i> Incorrect</p>

                        </div>


                </form>

</div>
</div>



