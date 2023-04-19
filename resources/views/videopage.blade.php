<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/videopage_style.css') }}" rel="stylesheet">
    <style>

    </style>
    <title>Просмотр</title>
</head>

<body>
    @include('components.header')

    <div id="container">
        <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'></video>
        <p>{{ $video->title }}</p>
        <p>{{ \Carbon\Carbon::parse($video->created_at)->format('d.m.Y H:m') }}</p>
        <div id="author">
            <img src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
            <p>{{ $user->nikname}}</p>
        </div>
        @auth
        <div id="raiting">
            @if(App\Models\Like::where([
            ['users_id', '=', Auth::user()->id],
            ['videos_id', '=', $video->id],
            ])->exists())
            <!-- id и class не меняй, но можешь добавлять новые классы  начиная отсюда-->
            <!-- между button и span никаких элементов не вставляй -->
            <img onclick="like('{{ $video->id }}')" class="active" id="likes" src="{{ asset('storage/img/like.png') }}">
            @else
            <img onclick="like('{{ $video->id }}')" class="not_active" id="likes" src="{{ asset('storage/img/like.png') }}">
            @endif
            <span>{{ $video->likes }}</span>
            @if(App\Models\Dislike::where([
            ['users_id', '=', Auth::user()->id],
            ['videos_id', '=', $video->id],
            ])->exists())
            <img onclick="dislike('{{ $video->id }}')" class="active" id="dislikes" src="{{ asset('storage/img/like.png') }}">
            @else
            <img onclick="dislike('{{ $video->id }}')" class="not_active" id="dislikes" src="{{ asset('storage/img/like.png') }}">
            @endif
            <span>{{ $video->dislikes }}</span>
        </div>
        @endauth
        @guest
        <div id="raiting">
            <img  id="likes" src="{{ asset('storage/img/like.png') }}">
            <span>{{ $video->likes }}</span>
            <img  id="dislikes" src="{{ asset('storage/img/like.png') }}">
            <span>{{ $video->dislikes }}</span>
        </div>
        @endguest
        <p>{{ $video->description }}</p>
        
    </div>
    @auth
    <div id="comment_div">
    <img src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
        <textarea id="comment" name="comment" id="" cols="30" rows="10" placeholder="ваш комментарий"></textarea>
        <button onclick="getComment('{{ $video->id }}')" id="comment_btn">Отправить</button>
        <div id="error_container"></div>
    </div>
    @endauth
    
    <div id="comments">
        @include('components.comments')
    </div>
<!-- и до сюда -->


    <script>
        function like(id) {
            $.ajax({
                    url: '{{ route("liked") }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        if ($('#dislikes').hasClass('active')) {
                            let dislikes = $('#dislikes').next().html();
                            if (dislikes != 0) {
                                dislikes--;
                                $('#dislikes').next().html(dislikes);
                            }
                        }
                        let likes = $('#likes').next().html();
                        if (data == 1) {
                            likes++;
                            $('#likes').removeClass('not_active').addClass('active');
                            $('#dislikes').removeClass('active').addClass('not_active');
                        } else {
                            likes--;
                            $('#likes').removeClass('active').addClass('not_active');
                        }
                        $('#likes').next().html(likes);


                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    console.log(data);
                })
        }

        function dislike(id) {
            $.ajax({
                    url: '{{ route("disliked") }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if ($('#likes').hasClass('active')) {
                            let likes = $('#likes').next().html();
                            if (likes != 0) {
                                likes--;
                                $('#likes').next().html(likes);
                            }
                        }
                        let dislikes = $('#dislikes').next().html();
                        if (data == 1) {
                            dislikes++;
                            $('#dislikes').removeClass('not_active').addClass('active');
                            $('#likes').removeClass('active').addClass('not_active');
                        } else {
                            dislikes--;
                            $('#dislikes').removeClass('active').addClass('not_active');
                        }
                        $('#dislikes').next().html(dislikes);

                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {})
        }

        function sendComment(text, video_id) {
            $.ajax({
                    url: '{{ route("sendComment") }}',
                    method: 'GET',
                    data: {
                        text: text,
                        video_id: video_id
                    },
                    success: function(data) {
                        $('#comments').empty().append(data);
                        $('textarea').val('');
                        console.log(data);
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                })
        }

        function getComment(video_id) {
            let text = $('#comment').val();
            if (text.length > 300) {
                $('#error_container').empty();
                let p = '<p id="comment_error">Лимит символов превышен<p>'
                $('#error_container').append(p);
            } else
                $('#error_container').empty();
            sendComment(text, video_id);
        }
    </script>
</body>

</html>