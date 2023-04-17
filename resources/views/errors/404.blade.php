<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>404</h1>
    <h2>Ничего не найденно, Марк</h2>
    <img src="{{ asset('storage/img/muzhik.gif') }}" alt="">
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
            margin-left: 6%;
        }

        h2 {
            margin-top: 5%;
            font-size: 96px;
        }

        img {
            margin-top: 2%;
        }
    </style>
</body>
</html>
