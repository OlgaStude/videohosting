    @auth
        <a class="logout" href="{{ route('logout') }}">Выйти</a>
    @if(Auth::user()->status == 'admin')
    <a class="admin-button" href="{{ route('admin')}} ">Админская панель</a>
    @endif

    <a class="user-icon" href="{{ url('userpage/'.Auth::user()->id) }}"><img src="{{ asset('storage/profile_pics/'.Auth::user()->path) }}" alt=""></a>
    <div class="add-button"><a class="add-button-a" href="{{ route('videoupload') }}">+</a></div>
    @endauth
    @guest

        <a class="regg-button" href="{{ route('register') }}"><button class="reg-button">Регистрация</button></a>
        <a class="authh-button" href="{{ route('login') }}"><button class="auth-button">Авторизация</button></a>
    @endguest
