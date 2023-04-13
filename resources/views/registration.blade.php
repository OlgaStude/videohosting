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
    @include('components.header')
    <h1>Регистрация</h1>
    <form action="{{ route('user_register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Никнейм</p>
        <input type="text" name="nikname" value="{{ old('nikname') }}">
        @error('nikname')
        <p>{{ $message }}</p>
        @enderror
        <p>E-mail</p>
        <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        <p>Пароль</p>
        <input type="password" name="password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        <p>Подтвердите пароль</p>
        <input type="password" name="password_r">
        @error('password_r')
        <p>{{ $message }}</p>
        @enderror
        <input type="file" name="pfp">
        @error('pfp')
        <p>{{ $message }}</p>
        @enderror
        <button type="submit">Регистрация</button>
    </form>
    <p>есть аккаунт? Войдите</p>
    <button><a href="{{ route('register') }}">Регистрация</a></button>
</body>

</html>