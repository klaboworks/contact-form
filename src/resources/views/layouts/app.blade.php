<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset ('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__site-title inika-regular">FashionablyLate</h1>
            <nav class="nav-menu">
                <ul class="nav-menu__list">
                    @if(Auth::guest())
                    <li class="nav-menu__item inika-regular"><a href="/register">register</a></li>
                    <li class="nav-menu__item inika-regular"><a href="/login">login</a></li>
                    @endif
                    @if(Auth::check())
                    <form action="/logout" method="post">
                        @csrf
                        <li><button class="nav-menu__item inika-regular">logout</button></li>
                    </form>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>