<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/addVideoPage_style.css') }}" rel="stylesheet">
    <title>Добавить видео</title>
</head>

<body>
    <div class="container">
    @include('components.header')
    <h1>Загрузка видео</h1>
    <form action="{{ route('videouplaoding')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-item">
        <p>Ваше видео</p>
        <input class="input-file" type="file" name="video" alt="">
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
</body>

</html>
