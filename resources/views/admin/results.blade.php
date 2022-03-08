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
                <h2>Q. {{ $result->question_main }}</h2>
                <h4 class="mt-4 mb-2">
                    A. {{ $result->answer_user }}
                </h4>
                @if($result->answer_user == $result->correct_ans)
                    <p class="text-success fw-bold">( Correct Answer )</p>
                @else
                    <p class="text-danger fw-bold">( Incorrect Answer ) <span class="text-success">{{ $result->correct_ans }}</span></p>
                @endif
            @endforeach

            <hr>

            <p class="fs-5">Start Time:
                <span class="fw-bold">
                {{ date('F j, Y h:i:s A', strtotime($testtimes->start_time)) }}
                </span>
            </p>

                <p class="fs-5">End Time:
                    <span class="fw-bold">
                {{ ($testtimes->end_time != '' ? date('F j, Y h:i:s A', strtotime($testtimes->end_time)) : 'NaN') }}
                </span>
                </p>

            <p class="fs-3">
                Time Taken:
                @if($testtimes->end_time != '')
                <span class="fw-bold">
                    {{ abs($year) }} year {{ abs($month) }} month {{ abs($day) }} day {{ abs($hour) }} hour {{ abs($minute) }} minute {{ abs($seconds) }} seconds
                </span>
                @else
                    <span class="fw-bold">NaN</span>
                @endif
            </p>


        </div>
    </div>
</div>

@include('layouts.footer')
