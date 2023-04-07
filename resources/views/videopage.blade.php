<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  <style>
    .active{
        background-color: red;
    }
    .not_active{
        background-color: grey;
    }
  </style>
    <title>Просмотр</title>
</head>
<body>
@include('components.header')
    <div id="container">
        <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'></video>
        <p>{{ $video->title }}</p>
        <p>{{ $video->created_at }}</p>
        <p>{{ $video->description }}</p>
        @auth
            <div id="raiting">
            @if(App\Models\Like::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $video->id],
            ])->exists())
                <button onclick="like('{{ $video->id }}')" class="active" id="likes">понравилось</button>
            @else
                <button onclick="like('{{ $video->id }}')" class="not_active" id="likes">понравилось</button>
            @endif
                <span>{{ $video->likes }}</span>
            @if(App\Models\Dislike::where([
                ['users_id', '=', Auth::user()->id],
                ['videos_id', '=', $video->id],
            ])->exists())
                <button onclick="dislike('{{ $video->id }}')" class="active" id="dislikes">не понравилось</button>
            @else
                <button onclick="dislike('{{ $video->id }}')" class="not_active" id="dislikes">не понравилось</button>
            @endif
                <span>{{ $video->dislikes }}</span>
            </div>
        @endauth
        @guest
            <div id="raiting">
                <button id="likes">понравилось</button>
                <span>{{ $video->likes }}</span>
                <button id="dislikes">не понравилось</button>
                <span>{{ $video->dislikes }}</span>
            </div>
        @endguest
    </div>

    @auth
    <div>
        <textarea id="comment" name="comment" id="" cols="30" rows="10" placeholder="ваш комментарий"></textarea>
        <button onclick="getComment('{{ $video->id }}')" id="comment_btn">Отправить</button>
    </div>
    @endauth

    <div id="comments">
        @include('components.comments')
    </div>
    

    <script>
    function like(id){
        $.ajax({
            url: '{{ route("liked") }}',
            method: 'GET',
            data: {id: id},
            success: function(data){
                let likes = $('#likes').next().html();
                if(data == 1){
                    likes++;
                    $('#likes').removeClass('not_active').addClass('active');
                    $('#dislikes').removeClass('active').addClass('not_active');
                }else{
                    likes--;
                    $('#likes').removeClass('active').addClass('not_active');
                    $('#dislikes').removeClass('not_active').addClass('active');
                }
                $('#likes').next().html(likes);
                let dislikes = $('#dislikes').next().html();
                if(dislikes != 0){
                    dislikes--;
                    $('#dislikes').next().html(dislikes);
                }

            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError){
            $("#loading").remove();
        })
    }

    function dislike(id){
        $.ajax({
            url: '{{ route("disliked") }}',
            method: 'GET',
            data: {id: id},
            success: function(data){
                let dislikes = $('#dislikes').next().html();
                if(data == 1){
                    dislikes++;
                    $('#dislikes').removeClass('not_active').addClass('active');
                    $('#likes').removeClass('active').addClass('not_active');
                }else{
                    dislikes--;
                    $('#dislikes').removeClass('active').addClass('not_active');
                    $('#likes').removeClass('not_active').addClass('active');
                }
                $('#dislikes').next().html(dislikes);
                let likes = $('#likes').next().html();
                if(likes != 0){
                    likes--;
                    $('#likes').next().html(likes);
                }
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError){
        })
    }

    function sendComment(text, video_id){
        $.ajax({
            url: '{{ route("sendComment") }}',
            method: 'GET',
            data: {text: text, video_id: video_id},
            success: function(data){
                $('#comments').empty().append(data);
            console.log(data);
            }
        })
        .fail(function(jqXHR, ajaxOpions, throwError){
            console.log(data);
            $("#loading").remove();
        })
    }
    function getComment(video_id){
        let text = $('#comment').val();
        sendComment(text, video_id);
    }
    </script>
</body>
</html>