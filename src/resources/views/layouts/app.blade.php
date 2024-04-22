<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header__inner">
                <div class="header-utilities">
                    <a class="header__logo" href="/">
                        Attendance
                    </a>
                    <nav>
                        <ul class="header-nav">
                            @if (Auth::check())
                            <li class="header-nav__item">
                                <a class="header-nav__link" href="/mypage">マイページ</a>
                            </li>
                            <li class="header-nav__item">
                                <form class="form" action="/logout" method="post">
                                    @csrf
                                    <button class="header-nav__button">ログアウト</button>
                                </form>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
        <footer class="footer">
            <div class="footer__inner">
                <div class="footer-utilities">
                    <a class="footer__logo" href="/">
                        <small>&copy; 2019 Atte,inc.</small>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>