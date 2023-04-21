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
            <br>
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
            <br>
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