@include('layouts.header', ['title' => $title])

<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4 fw-bold text-center">How To Value Your Franchise</h1>
            <p class="text-center fs-5 mb-4">These are the factors that are looked at when you would like to sell your Nummry franchise.</p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">Current age of student.  </h4>
            <p class="fs-5">The younger the student is, the higher value of your franchise because that creates a longer lifetime value of that subscription. For example if the student is in first grade, that is potentially 11 more years of lifetime value of that one student.</p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">How long student has been enrolled in tutoring.</h4>
            <p class="fs-5">The longer a student has been enrolled, the higher the value of your franchise will be because the longer they're enrolled, chances increase for them continuing their enrollment.</p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">How many children from same household enrolled.</h4>
            <p class="fs-5">More children from the same household increases your franchise's value because if one child needs help with tutoring, the chances increase that other children may also need tutoring. </p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">How many learning exercises and days parents have chosen for their child.  </h4>
            <p class="fs-5">If the parents have chosen and maintained for example, 5 days per week of learning exercises and 40 questions per day as opposed 2 days and 10 questions per day, this will tend to increase the value of your franchise because this shows that parents value their child's education more and want them to engaging in math and tutoring more. </p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">Age of parents.  </h4>
            <p class="fs-5">Younger parents will tend to increase the value of your franchise because they may still decide to have an additional child.</p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">Household income</h4>
            <p class="fs-5">Higher income household will increase the value of your franchise.</p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">How child is doing in tutoring.</h4>
            <p class="fs-5">If our data points show that a child that is doing a little more poorly in tutoring, this will increase the value of your franchise because parents may disenroll their child from tutoring if they see their child doing great in tutoring. </p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">Are the parents a part of any school organizations or groups.</h4>
            <p class="fs-5">If the parents are a part of various schools groups or organizations will increase the value of your franchise because they this will increase the chance of parents sharing their promo code with more people and any new sign up from any current parent subscriber will automatically be added to your franchise. </p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">Are parents college graduates.</h4>
            <p class="fs-5">Parents who are college graduates will increase the value of your franchise because they will value their child's grades more, so their child is able to get into college. </p>

            <p>&nbsp;</p>

            <h4 class=" fw-bold">Percentage of your overall subscribers that have each of the above factors. </h4>
            <p class="fs-5">For example, what is the percentage of your subscribers that have a 7 year old child.</p>


            <div class="d-grid gap-2 mx-auto col-md-6 mt-6">
                <a class="btn btn-primary btn-lg" href="{{ route('franchise.signup') }}">Sign Up For More Information</a>
            </div>

        </div>
    </div>
</div>

@include('layouts.footer')
