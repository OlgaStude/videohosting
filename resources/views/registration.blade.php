<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/registration_style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Пароль</p>
        <input type="password" name="password">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Подтвердите пароль</p>
        <input type="password" name="password_r">
        @error('password_r')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Загрузите аватар</p>
        <label class="custom-file-upload input-file">
        <input class="file-upload" type="file" name="pfp" alt="">
        <span id="file-selected"></span>
        <P>Загрузить</P>
        </label>
        @error('pfp')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <button class="register-button" type="submit">Регистрация</button>
    </form>
    <p class="acc">есть аккаунт? Войдите</p>
    <button class="auth-button"><a href="{{ route('login') }}">Авторизация</a></button>
    </div>

    <script>
        $('.file-upload').bind('change', function() { var fileName = ''; fileName = $(this).val().split('\\'); $('#file-selected').html(fileName[fileName.length - 1]); $('.custom-file-upload p').hide();})
        
    </script>
</body>

</html>
