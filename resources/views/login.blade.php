<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/login_style.css') }}" rel="stylesheet">
    <title>Вход</title>
</head>

<body>
    <div class="container">
         <div class="logo">
            <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
            <p class="logo-name">FanHub</p>
        </div>
    <h1>авторизация</h1>
    <form action="{{ route('user_login') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
        <p>E-mail</p>
        <input type="text" name="email">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Пароль</p>
        <input type="password" name="password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        @error('formError')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <button class="auth-button" type="submit">Вход</button>
    </form>
    <p class="acc">Нет аккаунта? Зарегистрируйтесь</p>
    <button class="register-button"><a href="{{ route('register') }}">Регистрация</a></button>
    </div>
</body>

</html>
