@foreach($videos as $video)
        <div class="video">
            <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'>
            </video>
            <p class="title-name"><a href="{{ url('video/'.$video->id) }}">{{ $video->title }}</a></p>
            <p class="date">{{ $video->created_at }}</p>
        <div class="restrictions">
            <!-- между select и button ничего не ставить -->
            <!-- class="restrict_btn" не меняй -->
            <select name="" class="restrictions">
                <option <?php if ($video->restrictions == 0) echo 'selected'; ?> value="0">Без ограничений</option>
                <option <?php if ($video->restrictions == 1) echo 'selected'; ?> value="1">Нарушение</option>
                <option <?php if ($video->restrictions == 2) echo 'selected'; ?> value="2">Теневой бан</option>
                <option <?php if ($video->restrictions == 3) echo 'selected'; ?> value="3">Бан</option>
            </select>
            <button value="{{ $video->id }}" class="restrict_btn">Установить ограничение</button>
        </div>
        </div>
        @endforeach