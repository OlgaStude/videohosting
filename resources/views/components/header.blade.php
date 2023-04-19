    @auth
        <a class="logout" href="{{ route('logout') }}">Выйти</a>
    @if(Auth::user()->status == 'admin')
    <a href="{{ route('admin')}} ">Админская панель</a>
    @endif

    <a class="user-icon" href="{{ url('userpage/'.Auth::user()->id) }}"><img src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt=""></a>
        <div class="add-button"><a class="" href="{{ route('videoupload') }}">+</a></div>
    @endauth
    @guest
        <a href="{{ route('register') }}"><button class="reg-button">Регистрация</button></a>
        <a href="{{ route('login') }}"><button class="auth-button">Авторизация</button></a>
    @endguest
