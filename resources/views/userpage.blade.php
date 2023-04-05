<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница пользователя</title>
</head>
<body>
    @include('components.header')
    <p>Это страница {{ App\Models\User::find($owner_id)->nikname }}</p>
    <img src="{{ asset('storage/profile_pics/'.App\Models\User::find($owner_id)->path) }}" alt="">
</body>
</html>