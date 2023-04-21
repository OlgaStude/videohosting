<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/addVideoPage_style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Добавить видео</title>
</head>

<body>
    <div class="container">
    @include('components.header')
     <div class="logo">
        <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
        <p class="logo-name">FanHub</p>
    </div>
    <h1>Загрузка видео</h1>
    <form action="{{ route('videouplaoding')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
        <p>Ваше видео</p>
        <label class="custom-file-upload input-file">
        <input class="file-upload" type="file" name="video" alt="">
        <span id="file-selected"></span>
        <P>Загрузить</P>
        </label>
        <br>
        @error('video')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Название видео</p>
        <input type="text" name="title">
        <br>
        @error('title')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input-item">
        <p>Описание видео</p>
        <textarea name="description" cols="30" rows="10"></textarea>
        <br>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
        </div>

        <div class="input-item">
        <p>Категория видео</p>
        <select name="category">
            <option value="TVseries">Сериалы</option>
            <option value="cartoon">Анимация</option>
            <option value="film">Фильмы</option>
            <option value="game">Игры</option>
        </select>
        @if(session('success_message') !== null)
        <p class="success">{{ session('success_message') }}<p>
        <p class="success">{{ Session::forget('success_message') }}</p>
        @endif
        </div>
        <button class="upload-button" type="submit">Загрузить</button>
    </form>
    </div>

    <script>
        $('.file-upload').bind('change', function() { var fileName = ''; fileName = $(this).val().split('\\'); $('#file-selected').html(fileName[fileName.length - 1]); $('.custom-file-upload p').hide();})
        
    </script>
</body>

</html>
