    <a href="{{ route('mainPage') }}">Главная</a>
@auth
    <a href="{{ route('logout') }}">Выйти</a>
    <a href="{{ url('userpage/'.Auth::user()->id) }}">Личка</a>
    <a href="{{ route('videoupload') }}">Добавить видео</a>
    @if(Auth::user()->status == 'admin')
        <a href="{{ route('admin')}} ">Админская панель</a>
    @endif
@endauth
@guest
    <a href="{{ route('register') }}">Регистрация</a>
    <a href="{{ route('login') }}">Войти</a>
@endguest
