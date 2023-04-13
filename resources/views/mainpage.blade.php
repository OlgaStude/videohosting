<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/mainpage_style.css') }}" rel="stylesheet">
    <title>Главная</title>
    <style>
        #no_result {
            display: none;
        }
    </style>
</head>

<body>
    @include('components.header')
    <div>
        <div>
            <img src="" alt="">
            <p>фильмы</p>
        </div>
        <div>
            <img src="" alt="">
            <p>сериалы</p>
        </div>
        <div>
            <img src="" alt="">
            <p>анимация</p>
        </div>
        <div>
            <img src="" alt="">
            <p>игры</p>
        </div>
    </div>
    <div id="search_container">
        <!-- id="searchbar", id="serch_btn", id="no_result" не менять -->
        <input type="text" id="searchbar" name="search_word">
        <button onclick="getword()" id="serch_btn">Поиск</button>
    </div>
    <form action="{{ route('mainPage') }}" id="no_result">
        <p>У нас такого нет</p>
        <button>назад</button>
    </form>
    <div id="videos_container">
        @include('components.mainpagevideos')

    </div>

    <script>
        function getword() {
            let search_word = $('#searchbar').val();
            make_search(search_word);
        }

        function make_search(search_word) {
            $.ajax({
                    url: '{{ route("search") }}',
                    method: 'GET',
                    data: {
                        search_word: search_word
                    },
                    success: function(data) {

                        if (data.length == 0) {
                            $('#videos_container').empty();
                            $('#no_result').show();
                        } else {
                            $('#videos_container').empty().append(data);
                        }

                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    $("#loading").remove();
                })
        }

        $('#searchbar').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                getword();
            }
        });
    </script>
</body>

</html>