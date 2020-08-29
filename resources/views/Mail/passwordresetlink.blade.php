<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Password Mail Got {{$data->forget_password_mail}}</h1>
    <a href="{{route('user.getUserPasswordView',$data->forget_password_token)}}">Click this Link</a>
</body>
</html>