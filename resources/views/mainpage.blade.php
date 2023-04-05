<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
@include('components.header')
    <div id="videos_container">
        @foreach($videos as $video)
            <div class="video">
                <p>{{ $video->title }}</p>
                <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'></video>
                <p>{{ $video->created_at }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>