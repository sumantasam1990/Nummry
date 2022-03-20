@include('layouts.header', ['title' => $title])
<style>
    .form-group {
        margin-bottom: 20px;
    }
</style>
<div class="container-fluid">
    @include('layouts.alert')
    <div class="row">
        <div class="col-md-10 mx-auto">

            <div class="row">
                <div class="col-md-8 mt-4">
                    <h1 class="display-4 fw-bold mb-4">Teacher’s Appreciation Promotion. </h1>

                    <p>Teachers, sign up parents of school aged kids to Nummry for a 7 day free trial and we will pay you $100 every week that they remain a paid user. </p>

                    <p>This will apply to any parents you sign up ONLY through March 26, 2022. </p>

                    <p>Once you sign up, we will email you your promo code that you can provide to the parents that you sign up. </p>
                </div>
                <div class="col-md-4 mx-auto mt-4" style="background: #eeeeee; padding: 20px; border-radius: 8px;">
                    <form action="{{ route('teacher.promotion.post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" required name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Your Instagram Handle Username</label>
                            <input type="text" name="insta" class="form-control" placeholder="@insta_username">
                        </div>
                        <div class="form-group">
                            <label>Your Email</label>
                            <input type="email" required name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Your Phone Number</label>
                            <input type="text" required name="phone" class="form-control">
                        </div>

                        <div class="d-grid gap-2 mt-4 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>







        </div>
    </div>
</div>






@include('layouts.footer')
