@include('layouts.header', ['title' => $title])

<div class="container-fluid sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $exp = explode(' ', auth()->user()->name);
                @endphp
                <h2 class="fs-3 fw-bold"><a href="{{ route('dashboard') }}" class="text-primary">Dashboard </a> > Lessons  > {{ date('F j, Y', strtotime($lesson->datetime)) }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-6">

    @include('layouts.alert')

    <div class="row">
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

        <div class="col-md-10" id="html">
            <script>

                function pause_timer_ajax() {
                    $.ajax({
                        url: '{{ route('pause.timer.ajax') }}',
                        type: "post",
                        data: { "_token": "{{ csrf_token() }}", "str_u": "{{ auth()->user()->id }}", "str_l": "{{ $lesson->id }}", "question_id": "{{ $question->id }}" },
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
                        data: { "_token": "{{ csrf_token() }}", "str_u": "{{ auth()->user()->id }}", "str_l": "{{ $lesson->id }}", "question_id": "{{ $question->id }}" },
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
                    @if(count($pause_resume_chk) === 0)
                    <form id="frm_details" name="frm_details" method="post">
                        @else
                            <form>
                        @endif

                        @csrf
                        <p class="p">
                        @if($question->q_one == '')
                            {{ $question->question_main }}

                        @else
                                @if($question->q_image === 1)
                                    <img style="width: 300px; height: 300px; object-fit: cover;" src="{{ asset('uploads/' . $question->question_main) }}">
                                @else
                                    {{ $question->question_main }}
                                @endif

                            <div class="row mt-6 mb-4">
                                <div class="col-md-3">

                                    @if($question->q_image === 1)
                                        <input type="radio" name="ans" value="1">
                                        <img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_one) }}">
                                    @else
                                        <input type="radio" name="ans" value="{{ $question->q_one }}">
                                        {{ $question->q_one }}
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    @if($question->q_image === 1)
                                        <input type="radio" name="ans" value="2">
                                        <img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_two) }}">
                                    @else
                                        <input type="radio" name="ans" value="{{ $question->q_two }}">
                                        {{ $question->q_two }}
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    @if($question->q_image === 1)
                                        <input type="radio" name="ans" value="3">
                                        <img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_three) }}">
                                    @else
                                        <input type="radio" name="ans" value="{{ $question->q_three }}">
                                        {{ $question->q_three }}
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    @if($question->q_image === 1)
                                        <input type="radio" name="ans" value="4">
                                        <img style="width: 120px; height: 120px; object-fit: cover;" src="{{ asset('uploads/' . $question->q_four) }}">
                                    @else
                                        <input type="radio" name="ans" value="{{ $question->q_four }}">
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

                            @if(count($pause_resume_chk) === 0)
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-lg mb-4">Submit</button>

                                <p id="correct" style="background: #eee; padding: 6px; display: none;" class="fs-2 text-success fw-bold"> <i class="bi bi-check2"></i> Correct</p>

                                <p id="incorrect" style="background: #eee; padding: 6px; display: none;" class="fs-2 text-danger fw-bold"><i class="bi bi-x-circle"></i> Incorrect</p>

                            </div>
                            @endif

                    </form>

                </div>
            </div>
        </div>
        {{--        timer--}}
        <div class="col-md-2 text-center">

            @if(count($pause_resume_chk) === 0)
            <p id="timer"></p>
            @else
                <p class="text-danger fw-bold fs-5">Timer Paused.</p>
            @endif

            @if(count($pause_resume_chk) > 0)
                <a onclick="resume_timer_ajax();" id="resume_time" style="" href="javascript:void(0)" class="btn btn-success btn-lg"> Resume Timer</a>
            @else
                <a onclick="pause_timer_ajax();" id="pause_time" href="javascript:void(0)" class="btn btn-danger btn-lg"> Pause Timer</a>
            @endif

        </div>



    </div>
</div>


{{--<div class="container mt-50">--}}
{{--    <div class="row">--}}
{{--        <div class="col-12 text-left">--}}
{{--            <form action="" method="post">--}}
{{--                <div class="form-group">--}}
{{--                    <label class="fw-bold text-secondary text-left mb-3">Write message to your lesson planner about this problem.</label>--}}
{{--                    <textarea name="" rows="4" class="form-control" placeholder=""></textarea>--}}
{{--                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">--}}
{{--                        <button type="submit" class="btn btn-secondary big-btn" style="width: 120px;">Send</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@include('layouts.footer')


{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<script>
    {{--function startTimer(seconds, container, oncomplete) {--}}
    {{--    var startTime, timer, obj, ms = seconds*1000,--}}
    {{--        display = document.getElementById(container);--}}
    {{--    obj = {};--}}
    {{--    obj.resume = function() {--}}
    {{--        startTime = new Date().getTime();--}}
    {{--        timer = setInterval(obj.step,250); // adjust this number to affect granularity--}}
    {{--        // lower numbers are more accurate, but more CPU-expensive--}}
    {{--    };--}}
    {{--    obj.pause = function() {--}}
    {{--        ms = obj.step();--}}
    {{--        clearInterval(timer);--}}
    {{--    };--}}
    {{--    obj.step = function() {--}}
    {{--        var now = Math.max(0,ms-(new Date().getTime()-startTime)),--}}
    {{--            m = Math.floor(now/60000), s = Math.floor(now/1000)%60;--}}
    {{--        s = (s < 10 ? "0" : "")+s;--}}
    {{--        // set cookie--}}

    {{--            document.cookie = "m=" + m + "; path=/;";--}}
    {{--            document.cookie = "s=" + s + "; path=/;";--}}
    {{--            document.cookie = "now=" + now + "; path=/;";--}}


    {{--        display.innerHTML = '<i class="bi bi-alarm"></i> ' + m+":"+s;--}}
    {{--        if( now == 0) {--}}
    {{--            clearInterval(timer);--}}
    {{--            obj.resume = function() {};--}}
    {{--            if( oncomplete) oncomplete();--}}
    {{--        }--}}
    {{--        return now;--}}
    {{--    };--}}
    {{--    obj.resume();--}}
    {{--    return obj;--}}
    {{--}--}}


    {{--function getCookie(name) {--}}
    {{--    const value = `; ${document.cookie}`;--}}
    {{--    const parts = value.split(`; ${name}=`);--}}
    {{--    if (parts.length === 2) return parts.pop().split(';').shift();--}}
    {{--}--}}
    {{--var s = getCookie('s');--}}
    {{--var now = getCookie('now');--}}

    {{--if(isNaN(parseFloat(s)) === false && s > 0) {--}}
    {{--    var timer = startTimer(s, "timer", function() {--}}


    {{--        window.location.href='{{ route('lessons.not-complete') }}';--}}
    {{--    });--}}
    {{--} else {--}}
    {{--    var timer = startTimer(20, "timer", function() {--}}

    {{--        window.location.href='{{ route('lessons.not-complete') }}';--}}
    {{--    });--}}
    {{--}--}}



    {{--const pause = document.getElementById('pause_time');--}}
    {{--const resume = document.getElementById('resume_time');--}}

    {{--pause.addEventListener('click', e => {--}}
    {{--    timer.pause();--}}
    {{--    $("#pause_time").hide();--}}
    {{--    $("#resume_time").fadeIn();--}}
    {{--    $(":submit").attr("disabled", true);--}}
    {{--});--}}

    {{--resume.addEventListener('click', e => {--}}
    {{--    timer.resume();--}}
    {{--    $("#pause_time").fadeIn();--}}
    {{--    $("#resume_time").hide();--}}
    {{--    $(":submit").removeAttr("disabled");--}}
    {{--});--}}

//-------------


        setInterval(function () {
        $.ajax({
            url: '{{ route('timer') }}',
            type: "post",
            data: { "_token": "{{ csrf_token() }}", "time_less": {{ $lesson->id }} },
            success: function(d) {
                if(d === "nan") {
                    $("#timer").html("finished exam.");
                } else {
                    $("#timer").html(d.time);
                }
            }
        });
    }, 500);





</script>

