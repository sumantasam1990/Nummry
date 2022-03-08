<div class="container-fluid footer mt-6">
    <footer class="container text-left mt-6">
        <div class="row">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-3 col-12 mb-4">
                <img src="{{ asset('images/logo.png') }}" style="width: 80px;">
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Nummry</p>
                <ul>
                    <li>
                        <a href="{{ route('register-user') }}">Sign Up</a>
                    </li>
                    <li>
                        <a href="{{ route('static.data.points') }}">Data Points</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Contact</p>
                <ul>
                    <li>
                        <a href="mailto:hello@nummry.com">Email</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0 mt-4 mt-md-0">Legal</p>
                <ul>
                    <li>
                        <a href="{{ route('terms') }}">Terms</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}">Privacy</a>
                    </li>


                    <li class="mt-4">
                        <a style="cursor: inherit" href="javascript:void(0)" nofollow>&copy; {{ date('Y') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

</div>



<div style="height: 20px;"></div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="{{ asset('js/bootstrap.js') }}"></script>



<script>






</script>

<script>
    $(function () {
        $('[data-bs-toggle="popover"]').popover({ trigger: "hover", html: true })
    })

    $('body').on('click', function (e) {
        $('[data-bs-toggle=popover]').each(function () {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    if ($(window).width() < 700) {
        $(document).ready(function () {
            if(localStorage.getItem('mob_alert') != 'done') {
                $("#mob_message").modal('show');
                localStorage.setItem('mob_alert', "done");
            }

        })
    }


</script>


<script>

</script>

{{--@livewireScripts--}}



</body>
</html>
