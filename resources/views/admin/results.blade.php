@include('admin.navbar', ['title' => $title])

<div class="container-fluid">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2>Results > {{ date('F j, Y', strtotime($lesson->datetime)) }} > {{ $user->name }}</h2>
            <hr>
        </div>
    </div>

    <div class="row mt-4">
        @include('layouts.alert')
        <div class="col-md-8 mx-auto">

            @foreach($results as $result)
                <h2>
                    Q.
                    @if($result->q_image === 1)
                        <img style="width: 200px; height: 200px; object-fit: cover;" src="{{ asset('uploads/' . $result->question_main) }}">
                    @else
                        {{ $result->question_main }}
                    @endif

                </h2>
                <h4 class="mt-4 mb-2">
                    A. {{ $result->answer_user }}
                </h4>
                @if($result->answer_user == $result->correct_ans)
                    <p class="text-success fw-bold">( Correct Answer )</p>
                @else
                    <p class="text-danger fw-bold">( Incorrect Answer ) <span class="text-success">{{ $result->correct_ans }}</span></p>
                @endif

{{--                time taken--}}

                @php
                        $testtimes = \App\Models\TestTime::whereLessonId($lesson->id)->where('question_id', '=', $result->qidd)->first();

                    if(isset($testtimes->start_time) != null){

                        $resume_pause = \App\Models\ResumePause::whereLessonId($lesson->id)->where('question_id', '=', $result->qidd)->get();

                        if(count($resume_pause) > 0) {
                    foreach($resume_pause as $rp) {
                        $date1 = new DateTime($rp->resume);
                        $date2 = new DateTime($rp->pause);
                        $diff = $date1->diff($date2);
                        $diff_f[] = $diff->i;
                        $diff_f_sec[] = $diff->s;
                        $diff_f_h[] = $diff->h;
                        $diff_f_m[] = $diff->m;
                        $diff_f_y[] = $diff->y;
                        $diff_f_day[] = $diff->d;
                    }

                    $datetime1 = new DateTime($testtimes->start_time);
                    $datetime2 = new DateTime($testtimes->end_time);
                    $interval = $datetime1->diff($datetime2);

                    $minute = $interval->i - array_sum($diff_f);
                    $seconds = $interval->s - array_sum($diff_f_sec);
                    $hour = $interval->h - array_sum($diff_f_h);
                    $day = $interval->d - array_sum($diff_f_day);
                    $month = $interval->m - array_sum($diff_f_m);
                    $year = $interval->y - array_sum($diff_f_y);

                    echo "Time took: " . abs($hour) . " hour " . abs($minute) . " minutes " . abs($seconds) . " seconds";


                } else {
                    $datetime1 = new DateTime($testtimes->start_time);
                    $datetime2 = new DateTime($testtimes->end_time);
                    $interval = $datetime1->diff($datetime2);

                    $minute = $interval->i;
                    $seconds = $interval->s;
                    $hour = $interval->h;
                    $day = $interval->d;
                    $month = $interval->m;
                    $year = $interval->y;

                    echo "Time took: " . abs($hour) . " hour " . abs($minute) . " minutes " . abs($seconds) . " seconds";

                }

                    }

                @endphp



            @endforeach

{{--            <hr>--}}

{{--            <p class="fs-5">Start Time:--}}
{{--                <span class="fw-bold">--}}
{{--                {{ date('F j, Y h:i:s A', strtotime($testtimes->start_time)) }}--}}
{{--                </span>--}}
{{--            </p>--}}

{{--                <p class="fs-5">End Time:--}}
{{--                    <span class="fw-bold">--}}
{{--                {{ ($testtimes->end_time != '' ? date('F j, Y h:i:s A', strtotime($testtimes->end_time)) : 'NaN') }}--}}
{{--                </span>--}}
{{--                </p>--}}

{{--            <p class="fs-3">--}}
{{--                Time Taken:--}}
{{--                @if($testtimes->end_time != '')--}}
{{--                <span class="fw-bold">--}}
{{--                    {{ abs($year) }} year {{ abs($month) }} month {{ abs($day) }} day {{ abs($hour) }} hour {{ abs($minute) }} minute {{ abs($seconds) }} seconds--}}
{{--                </span>--}}
{{--                @else--}}
{{--                    <span class="fw-bold">NaN</span>--}}
{{--                @endif--}}
{{--            </p>--}}


        </div>
    </div>
</div>

@include('layouts.footer')
