<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить видео</title>
</head>
<body>
@include('components.header')
    <form action="{{ route('videouplaoding')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Название видео">
        @error('title')
            {{ $message }}
        @enderror
        <input type="file" name="video">
        @error('video')
            {{ $message }}
        @enderror
        <textarea name="description" cols="30" rows="10">Описание</textarea>
        @error('description')
            {{ $message }}
        @enderror
        
        <select name="category">
            <option value="TVseries">Сериалы</option>
            <option value="cartoon">Мультфильмы</option>
            <option value="book">Книги</option>
        </select>
        @if(session('success_message') !== null)
            {{ session('success_message') }}
            {{ Session::forget('success_message') }}
        @endif
        <button type="submit">Опубликовать</button>
    </form>
</body>
</html>