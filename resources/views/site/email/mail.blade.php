<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
<h1>مرحبا </h1>
<p>لديك رسالة جديدة من : {{$email}}</p>
<p>اسم المرسل : {{$name}}</p>
<p> عنوان الرسالة : {{$sub}}</p>
<hr>
<p>{{$msg}}</p>
</body>
</html>