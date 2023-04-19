<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/userpage_style.css') }}" rel="stylesheet">
    <title>Страница пользователя</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
                <p class="logo-name">FanHub</p>
            </div>
            <div>
                <div class="category-item">
                    <img src="{{ asset('storage/img/film.png') }}" alt="">
                    <p>Фильмы</p>
                </div>
                <div class="category-item">
                    <img src="{{ asset('storage/img/serial.png') }}" alt="">
                    <p>Сериалы</p>
                </div>
                <div class="category-item">
                    <img src="{{ asset('storage/img/animation.png') }}" alt="">
                    <p class="category-name1">Анимация</p>
                </div>
                <div class="category-item">
                    <img src="{{ asset('storage/img/game.png') }}" alt="">
                    <p>Игры</p>
                </div>
            </div>
        </div>
    <div class="user-bar">
    @include('components.header')
    </div>

    <div id="videos_container">
        @foreach($videos as $video)
        <div class="video">
            <video src="{{ asset('storage/videos/'.$video->path) }}"></video>
            @if($video->category == 'TVseries')
            <div class="video-category">

            <p class="category-name">Сериалы</p>
            @elseif($video->category == 'cartoon')
            <br>
            <div class="video-category">
            <p class="category-name">Анимация</p>
            @elseif($video->category == 'film')
            <br>
            <div class="video-category">
            <p class="category-name">Фильмы</p>
            @elseif($video->category == 'game')
            <br>
            <div class="video-category">
            <p class="category-name">Игры</p>
            @endif
            </div>
            <p class="title-name"><a href="{{ url('video/'.$video->id) }}">{{ $video->title }}</a></p>
            <p class="date">{{ \Carbon\Carbon::parse($video->created_at)->format('d.m.Y H:m') }}</p>
            <p class="description">{{ $video->description }}</p>
            <div class="likes-panel">
            <div class="like-panel">
                <img src="{{ asset('storage/img/like.png') }}">
                <p class="likes">{{ $video->likes }}</p>
            </div>
            <div class="dislike-panel">
                <img src="{{ asset('storage/img/dislike.png') }}">
                <p class="likes">{{ $video->dislikes }}</p>
            </div>
            </div>
            <div class="restrictions">
            @if($video->restrictions == 0)
            <p class="restriction">Без ограничений</p>
            @elseif($video->restrictions == 1)
            <br>
            <p class="restriction">Нарушения</p>
            @elseif($video->restrictions == 2)
            <br>
            <p class="restriction">Теневой бан</p>
            @elseif($video->restrictions == 3)
            <br>
            <p class="restriction">Бан</p>
            @endif
            </div>
        </div>
        @endforeach
    </div>
    </div>
</body>

</html>
