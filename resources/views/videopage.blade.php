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
    <div class="container" id="container">
        <div class="logo">
                <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
                <p class="logo-name">FanHub</p>
        </div>
        <div class="video-panel">
        <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'></video>
        <p class="title">{{ $video->title }}</p>
        <p class="date">{{ \Carbon\Carbon::parse($video->created_at)->format('d.m.Y H:m') }}</p>
        <div id="author">
            <img src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
            <p class="author-name">{{ $user->nikname}}</p>
        </div>
        <p class="inscryption">{{ $video->description }}</p>
        @auth
        <div id="raiting">
            @if(App\Models\Like::where([
            ['users_id', '=', Auth::user()->id],
            ['videos_id', '=', $video->id],
            ])->exists())
            <!-- id и class не меняй, но можешь добавлять новые классы  начиная отсюда-->
            <!-- между button и span никаких элементов не вставляй -->
            <img onclick="like('{{ $video->id }}')" class="active" id="likes" src="{{ asset('storage/img/like-active.png') }}">
            @else
            <img onclick="like('{{ $video->id }}')" class="not_active" id="likes" src="{{ asset('storage/img/like.png') }}">
            @endif
            <span>{{ $video->likes }}</span>
            @if(App\Models\Dislike::where([
            ['users_id', '=', Auth::user()->id],
            ['videos_id', '=', $video->id],
            ])->exists())
            <img onclick="dislike('{{ $video->id }}')" class="active" id="dislikes" src="{{ asset('storage/img/dislike-active.png') }}">
            @else
            <img onclick="dislike('{{ $video->id }}')" class="not_active" id="dislikes" src="{{ asset('storage/img/dislike.png') }}">
            @endif
            <span class="dislike-num">{{ $video->dislikes }}</span>
        </div>
        @endauth
        @guest
        <div id="raiting">
            <img id="likes" src="{{ asset('storage/img/like.png') }}">
            <span>{{ $video->likes }}</span>
            <img id="dislikes" src="{{ asset('storage/img/dislike.png') }}">
            <span>{{ $video->dislikes }}</span>
        </div>
        @endguest
        </div>
    @auth
    <div id="comment_div">
        <img class="comment-aang" src="{{ asset('storage/profile_pics/'.$user->path) }}" alt="">
        <input id="comment" name="comment" id="" cols="30" rows="10" placeholder="Введите комментарий">
        <button onclick="getComment('{{ $video->id }}')" id="comment_btn">Добавить</button>
        <div id="error_container"></div>
    </div>
    @endauth
    
    <div id="comments">
        @include('components.comments')
    </div>
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
                        if ($('#dislikes').attr('src', "{{ asset('storage/img/dislike-active.png') }}")) {
                            let dislikes = $('#dislikes').next().html();
                            if (dislikes != 0) {
                                dislikes--;
                                $('#dislikes').next().html(dislikes);
                            }
                        }
                        let likes = $('#likes').next().html();
                        if (data == 1) {
                            likes++;
                            $('#likes').attr('src', "{{ asset('storage/img/like-active.png') }}");
                            $('#dislikes').attr('src', "{{ asset('storage/img/dislike.png') }}");
                        } else {
                            likes--;
                            $('#likes').attr('src', "{{ asset('storage/img/like.png') }}");
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
                        if ($('#likes').attr('src', "{{ asset('storage/img/like-active.png') }}")) {
                            let likes = $('#likes').next().html();
                            if (likes != 0) {
                                likes--;
                                $('#likes').next().html(likes);
                            }
                        }
                        let dislikes = $('#dislikes').next().html();
                        if (data == 1) {
                            dislikes++;
                            $('#dislikes').attr('src', "{{ asset('storage/img/dislike-active.png') }}");
                            $('#likes').attr('src', "{{ asset('storage/img/like.png') }}");
                        } else {
                            dislikes--;
                            $('#dislikes').attr('src', "{{ asset('storage/img/dislike.png') }}");
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
                    console.log(data);
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