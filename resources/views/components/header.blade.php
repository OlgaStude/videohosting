    <a href="{{ route('mainPage') }}">Главная</a>
@auth
    <a href="{{ route('logout') }}">Выйти</a>
    <a href="{{ url('userpage/'.Auth::user()->id) }}">Личка</a>
    <a href="{{ route('videoupload') }}">Добавить видео</a>
@endauth
@guest
    <a href="{{ route('register') }}">Регистрация</a>
    <a href="{{ route('login') }}">Войти</a>
@endguest
