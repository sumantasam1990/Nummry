<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('images/fav.png') }}">

    <title>Nummry - {{ $title }}</title>

    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{--    @livewireStyles--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>
<body class="antialiased">

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Nummry - Administrator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Nummry</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('admin.dash') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users') }}">Users List</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lessons
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.dash') }}">Add Lesson</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.lesson.view') }}">View Lessons</a></li>

                                        </ul>
                                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tests
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.add.test') }}">Add Test</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.test.view') }}">View Tests</a></li>

                        </ul>
                    </li>

{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Questions--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">--}}
{{--                            <li><a class="dropdown-item" href="{{ route('admin.dash') }}">Add Question</a></li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.add.comparison') }}">Add Comparison</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.view.comparison') }}">View Comparison</a>
                    </li>









                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                                </ul>
                {{--                <form class="d-flex">--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                </form>--}}
            </div>
        </div>
    </div>
</nav>
