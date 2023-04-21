<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/userpage_style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Страница пользователя</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
                <p class="logo-name">FanHub</p>
            </div>
            <div class="category-div">
                <div data-category='film' class="category-item">
                    <img src="{{ asset('storage/img/film.png') }}" alt="">
                    <p>Фильмы</p>
                </div>
                <div data-category='TVseries' class="category-item">
                    <img src="{{ asset('storage/img/serial.png') }}" alt="">
                    <p>Сериалы</p>
                </div>
                <div data-category='cartoon' class="category-item">
                    <img src="{{ asset('storage/img/animation.png') }}" alt="">
                    <p class="category-name1">Анимация</p>
                </div>
                <div data-category='game' class="category-item">
                    <img src="{{ asset('storage/img/game.png') }}" alt="">
                    <p>Игры</p>
                </div>
            </div>
        </div>
    <div class="user-bar">
    <form action="{{ route('mainPage') }}" id="no_result">
        <p>У вас такого нет</p>
    </form>
    @include('components.header')

    </div>

    <div id="videos_container">
        @include('components.userVideos')
    </div>
    </div>

    <script>

$('.category-item').click(function(){
            let search_word = $(this).data('category');
            make_category_search(search_word);
        })
        function make_category_search(search_word) {
            $.ajax({
                    url: '{{ route("searchCategoryUser") }}',
                    method: 'GET',
                    data: {
                        search_word: search_word
                    },
                    success: function(data) {

                        if (data.length == 0) {
                            $('#videos_container').empty();
                            $('#no_result').show();
                        } else {
                            $('#no_result').hide();

                            $('#videos_container').empty().append(data);
                        }

                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    $("#loading").remove();
                })
        
        }
    </script>
</body>

</html>
