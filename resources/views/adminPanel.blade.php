<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/adminPanel_style.css') }}" rel="stylesheet">
    <title>Админка</title>
</head>

<body>
    @include('components.header')
    <div id="container">
        @foreach($videos as $video)
        <div class="video">
            <p><a href="{{ url('video/'.$video->id) }}">{{ $video->title }}</a></p>
            <video src="{{ asset('storage/videos/'.$video->path) }}" controls='true'></video>
            <p>{{ $video->created_at }}</p>
        </div>
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
        @endforeach
    </div>


    <script>
        function change(id, restriction) {
            $.ajax({
                    url: '{{ route("statusChange") }}',
                    method: 'GET',
                    data: {
                        id: id,
                        restriction: restriction
                    },
                    success: function(data) {
                        console.log(data)
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {})
        }

        $('.restrict_btn').click(function() {
            let restriction = $(this).prev().find(":selected").val();
            let id = $(this).val();
            change(id, restriction);
        })
    </script>
</body>

</html>