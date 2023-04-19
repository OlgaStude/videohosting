<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/registration_style.css') }}" rel="stylesheet">
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <div class="logo">
            <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
            <p class="logo-name">FanHub</p>
        </div>
    <h1>Регистрация</h1>
    <form action="{{ route('user_register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
        <p>Никнейм</p>
        <input type="text" name="nikname" value="{{ old('nikname') }}">
        @error('nikname')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>E-mail</p>
        <input type="text" name="email" value="{{ old('email') }}">
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
        </div>
        <div class="input-item">
        <p>Подтвердите пароль</p>
        <input type="password" name="password_r">
        @error('password_r')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <input class="input-file" type="file" name="pfp">
        @error('pfp')
        <p>{{ $message }}</p>
        @enderror
        </div>
        <button class="register-button" type="submit">Регистрация</button>
    </form>
    <p class="acc">есть аккаунт? Войдите</p>
    <button class="auth-button"><a href="{{ route('login') }}">Авторизация</a></button>
    </div>
</body>

</html>
