@include('layouts.header', ['title' => $title])

<div class="container mt-6">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 fw-bold text-center">Become A Math Tutor</h1>
            <p class="fs-5 mb-4 fw-bold text-center">Make $20 per hour working from home.</p>
        </div>
    </div>

    <div class="row mt-4 text-center">
        <div class="col-12">
            <h4 class="fs-5 fw-bold">
                Contact us if you are available and interested in become an online math tutor for Kindergartners to Grade 12 math students. You will make $20 an hour and work from home.
            </h4>

            <a class="btn btn-primary btn-lg mt-4" href="{{ route('tutor.signup') }}">I'm Interested</a>
        </div>
    </div>
</div>

@include('layouts.footer')
