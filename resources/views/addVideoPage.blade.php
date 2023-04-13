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
    @include('components.header')
    <h1>Загрузка видео</h1>
    <form action="{{ route('videouplaoding')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Ваше видео</p>
        <input type="file" name="video">
        @error('video')
        {{ $message }}
        @enderror
        <p>Название видео</p>
        <input type="text" name="title">
        @error('title')
        {{ $message }}
        @enderror
        <p>Описание видео</p>
        <textarea name="description" cols="30" rows="10">Описание</textarea>
        @error('description')
        {{ $message }}
        @enderror
        
        <p>Категория видео</p>
        <select name="category">
            <option value="TVseries">Сериалы</option>
            <option value="cartoon">Мультфильмы</option>
            <option value="book">Книги</option>
        </select>
        @if(session('success_message') !== null)
        {{ session('success_message') }}
        {{ Session::forget('success_message') }}
        @endif
        <button type="submit">Загрузить</button>
    </form>
</body>

</html>