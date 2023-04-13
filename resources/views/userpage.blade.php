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
    @include('components.header')

    <div id="videos_container">
        @foreach($videos as $video)
        <div class="video">
            <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'></video>
            <p>Категория: {{ $video->category }}</p>
            <p><a href="{{ url('video/'.$video->id) }}">{{ $video->title }}</a></p>
            <p>{{ \Carbon\Carbon::parse($video->created_at)->format('d.m.Y H:m') }}</p>
            <p>{{ $video->descroption }}</p>
            <div>
                <button>Понравилось</button>
                <p>{{ $video->likes }}</p>
            </div>
            <div>
                <button>Не понравилось</button>
                <p>{{ $video->likes }}</p>
            </div>
            @if($video->restrictions == 0)
            <p>Без ограничений</p>
            @elseif($video->restrictions == 1)
            <p>Нарушения</p>
            @elseif($video->restrictions == 2)
            <p>Теневой бан</p>
            @elseif($video->restrictions == 3)
            <p>Бан</p>
            @endif
        </div>
        @endforeach
    </div>
</body>

</html>