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
    @include('components.header')
    <h1>авторизация</h1>
    <form action="{{ route('user_login') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>E-mail</p>
        <input type="text" name="email">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        <p>Пароль</p>
        <input type="password" name="password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        @error('formError')
        <p>{{ $message }}</p>
        @enderror
        <button type="submit">Вход</button>
    </form>
    <p>Нет аккаунта? Зарегистрируйтесь</p>
    <button><a href="{{ route('login') }}">Авторизация</a></button>
</body>

</html>