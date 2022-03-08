{{--<div class="container-fluid footer mt-6">--}}
{{--    <footer class="container text-left mt-6">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-1 col-12"></div>--}}
{{--            <div class="col-md-3 col-12 mb-4">--}}
{{--                <img src="{{ asset('images/logo.webp') }}">--}}
{{--            </div>--}}
{{--            <div class="col-md-2 col-6">--}}
{{--                <p class="fw-bold mb-0">Scorng</p>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="/pricing">Pricing</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/signup">Sign Up</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/login">Login</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 col-6">--}}
{{--                <p class="fw-bold mb-0">Support</p>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="/about">About Us</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/howitworks">How It Works</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/features">Features</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="/faq">FAQs</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 col-6">--}}
{{--                <p class="fw-bold mb-0 mt-4 mt-md-0">Get In Touch</p>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="/contact">Message Us</a>--}}
{{--                    </li>--}}
{{--                    --}}{{--                    <li>--}}
{{--                    --}}{{--                        <a href="">Facebook</a>--}}
{{--                    --}}{{--                    </li>--}}
{{--                    --}}{{--                    <li>--}}
{{--                    --}}{{--                        <a href="">Twitter</a>--}}
{{--                    --}}{{--                    </li>--}}
{{--                    --}}{{--                    <li>--}}
{{--                    --}}{{--                        <a href="">Instagram</a>--}}
{{--                    --}}{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 col-6">--}}
{{--                <p class="fw-bold mb-0 mt-4 mt-md-0">Legal</p>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="/legal">Legal Stuff</a>--}}
{{--                    </li>--}}


{{--                    <li>--}}
{{--                        <a style="cursor: inherit" href="javascript:void(0)" nofollow>&copy; 2021</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}

{{--</div>--}}



<div style="height: 100px;"></div>




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
