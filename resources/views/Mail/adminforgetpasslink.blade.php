<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Admin Reset Password{{$data->forget_password_mail}}</h1>
    <a href="{{route('admin.getUserPasswordView',$data->forget_password_token)}}">Click this Link</a>
</body>
</html>