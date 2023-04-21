<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops</title>
</head>
<body>
    <div class="container">
    <div class="logo">
        <a href="{{ route('mainPage') }}"><img src="{{ asset('storage/img/logo.png') }}"></a>
        <p class="logo-name">FanHub</p>
    </div>
    <h1>404</h1>
    <h2>Ничего не найденно, Марк</h2>
    <img class="muzhik" src="{{ asset('storage/img/muzhik.gif') }}" alt="">
    </div>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #2D2E30;
        }

        h1, h2 {
            color: #FFFFFF;
        }

        h1 {
            margin-top: 5%;
            font-size: 128px;
        }

        .container {
            width: 1600px;
            text-align: center;
            margin: auto;
        }

        h2 {
            margin-top: 5%;
            font-size: 96px;
        }

        img {
            margin-top: 2%;
        }

        .logo {
            width: 150px;
            text-align: center;
            font-size: 40px;
            color: #FBCE04;
            position: absolute;
            top: 2vh;
            margin-right: 50%;
        }

        .logo p {
            margin-left: 6%;
            color: #FBCE04;
        }

        @media (max-width: 375px) {
        .container {
            width: 375px;
            text-align: center;
            margin: auto;
        }

        h1 {
            margin-top: 30%;
            font-size: 64px;
        }

        h2 {
            margin-top: 10%;
            font-size: 20px;
        }

        .muzhik {
            margin-top: 10%;
            width: 193px;
            height: 187px;
        }

        .logo {
            width: 51px;
            height: 51px;
            text-align: center;
            font-size: 40px;
            position: absolute;
            top: 2vh;
            margin-right: 50%;
        }

        .logo img {
            width: 51px;
            height: 51px;
        }

        .logo p {
            margin-left: 4%;
            color: #FBCE04;
            font-size: 15px;
        }
        }
    </style>
</body>
</html>
