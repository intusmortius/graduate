<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Graduate') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<body>
    @role("admin")
    <div class="admin">
        <a href={{ route("admin") }}>
            <div>Admin panel</div>
        </a>
    </div>
    @endrole
    <header class="header">

        <div class="container">
            <div class="head">
                <a href="{{ route("home") }}">
                    <div class="head__logo">
                        <span>PSTU</span>
                    </div>
                </a>
                <div id="burger" class="burger">
                    <div class="burger__line"></div>
                </div>
                <nav id="navmenu" class="head__nav">
                    @guest
                    <div class="head__list">
                        <a class="head__list-item" href="{{ route("login") }}">{{__("Вход")}}</a>
                        <a class="head__list-item" href="{{ route("register") }}">{{ __("Регистрация") }}</a>
                    </div>
                    @else
                    <div class="head__list">
                        <a href="{{ route("home") }}" class="head__list-item">{{__("Галерея")}}</a>
                        <a href="{{ route("table") }}" class="head__list-item">{{__("Списки")}}</a>
                        <a href="{{ route("profile",auth()->user()) }}" class="head__list-item">{{__("Профиль")}}</a>
                        <form method="POST" action="/logout">@csrf
                            <button class="head__list-item head__logout" type="submit"
                                name="submit">{{__("Выйти")}}</button>
                        </form>
                    </div>
                    @endguest
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        {{$slot}}
    </main>
    <footer class="footer">
        <div class="foot">
            <div class="foot__contacts">
                <h3 class="foot__title">Контакты</h3>
                <span class="foot__item">Вулиця Італійська, 115, 3 корпус ДВНЗ "ПДТУ"</span>
                <span class="foot__item">kaf-inf@i.ua</span>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="{{ asset("js/main.js") }}"></script>

</body>

</html>