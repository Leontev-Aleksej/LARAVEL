<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Конкурс открыток</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            @auth
                <a href="{{ route('contest') }}">Участвовать</a>
                @if(auth()->user()->email === 'admin@admin.com')
                    <a href="{{ route('admin.index') }}">Админ-панель</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>