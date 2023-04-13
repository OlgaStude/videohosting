    <div><a href="{{ route('mainPage') }}"><img src="" alt=""> Главная</a></div>
    @auth
    <a href="{{ route('logout') }}">Выйти</a>
    <a href="{{ url('userpage/'.Auth::user()->id) }}">Мои видео</a>
    @if(Auth::user()->status == 'admin')
    <a href="{{ route('admin')}} ">Админская панель</a>
    @endif
    <img src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt="">
    <div><a href="{{ route('videoupload') }}"><img src="" alt="">добавить видео</a></div>
    @endauth
    @guest
    <a href="{{ route('register') }}">Регистрация</a>
    <a href="{{ route('login') }}">Войти</a>
    @endguest