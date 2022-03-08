@include('layouts.header', ['title' => $title])

<div class="container mt-6">

    @include('layouts.alert')

    <div class="row">

        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 mx-auto">
            <div class="">


                <div class="box">
                    <h2 class="fs-2 text-left mb-2">Invitation</h2>
                    <p class="fs-5 mb-4">Send an invitation to your teacher.</p>
                    <form action="{{ route('teacher.invitation.post') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="mb-2">Teacher Email</label>
                            <input type="email" id="email_address" class="form-control" name="email" required autofocus autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label class="mb-2">Teacher Name</label>
                            <input type="text" id="password" class="form-control" name="name" required autocomplete="off">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>


                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-dark big-btn">Send Invitation</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



@include('layouts.footer')
