<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <div class="container_box">
        <header class="header_band">
            <div class="header_band_box">
                <div class="header_box">
                    <a class="header_comp-logo" href="">
                        Attendance
                    </a>
                    <nav class="header_tool">
                        <ul class="header_nav">
                            @if (Auth::check())
                            <li class="header-nav__item">
                                <a class="header-nav__link" href="/sumsearch">日付別集計</a>
                            </li>
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
                        <small>&copy; since2019 Atte,inc.</small>
                    </a>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>