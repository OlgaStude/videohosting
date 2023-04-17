    @auth
        <a href="{{ route('logout') }}"><button class="logout">Выйти</button></a>
    @if(Auth::user()->status == 'admin')
    <a href="{{ route('admin')}} ">Админская панель</a>
    @endif
    <a href="{{ url('userpage/'.Auth::user()->id) }}"><img class="user-icon" src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt=""></a>
        <div class="add-location"><button class="add-button"><a href="{{ route('videoupload') }}">+</a></button></div>
    @endauth
    @guest
        <a href="{{ route('register') }}"><button class="reg-button">Регистрация</button></a>
        <a href="{{ route('login') }}"><button class="auth-button">Авторизация</button></a>
    @endguest
