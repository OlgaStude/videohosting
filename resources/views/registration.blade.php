<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    @include('components.header')
    <form action="{{ route('user_register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nikname" placeholder="Ваш ник">
        @error('nikname')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="email" placeholder="Ваша почта">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="password" placeholder="Пароль">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="password_r" placeholder="Повтор пароля">
        @error('password_r')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="pfp">
        @error('pfp')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">зарегистрироваться</button>
    </form>
</body>
</html>