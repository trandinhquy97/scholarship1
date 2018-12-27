<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <link rel="stylesheet" href="{{URL::asset('css/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">


</head>
<body >
<div class="box">
    <h2 class="head">Đổi mật khẩu</h2>
    <form action="{{url('/reset')}}" class="form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="inputBox">
            <input type="text" name="email" required="">
            <label class="label">Email</label>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
</div>

</body>
</html>