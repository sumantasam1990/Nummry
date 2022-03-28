@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 mx-auto">
            <div class="">


                <div class="box">
                    <h2 class="fs-1 text-left mb-4">Franchise Login</h2>
                    <form action="{{ route('franchise.login.post') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="mb-2">Your Email</label>
                            <input type="email" placeholder="Enter Your Email" id="email_address" class="form-control" name="email" required autofocus autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-2">Your Password</label>
                            <input type="password" placeholder="Enter Your Password" id="password" class="form-control" name="password" required autocomplete="offf">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark big-btn">Log in</button>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn text-black-50 text-decoration-underline" href="{{ route('franchise.forgot.password') }}">Forgot Password?</a>
                        </div>

                        <div class="d-grid gap-2">
                            <a class="btn btn-success mt-3 fw-bold big-btn" href="{{ route('franchise.signup') }}">Need A Franchise Account? Sign Up Now</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



@include('layouts.footer')
