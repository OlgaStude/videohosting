<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/adminPanel_style.css') }}" rel="stylesheet">
    <title>Админская панель</title>
</head>

<body>
    <div id="container">
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
        <div class="admin-bar">
        @include('components.header')
        </div>
        <div class="videos-container">
        @include('components.adminVideos')
        
        </div>
    </div>
<footer></footer>

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

        $('.category-item').click(function(){
            let search_word = $(this).data('category');
            make_category_search(search_word);
        })
        function make_category_search(search_word) {
            $.ajax({
                    url: '{{ route("searchCategoryAdmin") }}',
                    method: 'GET',
                    data: {
                        search_word: search_word
                    },
                    success: function(data) {
                        if (data.length == 0) {
                            console.log(data);
                            $('.videos-container').empty();
                            $('#no_result').show();
                        } else {
                            $('#no_result').hide();

                            $('.videos-container').empty().append(data);
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