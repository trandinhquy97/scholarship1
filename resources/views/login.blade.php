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
    <h2 class="head">Đăng nhập</h2>
    <form action="{{url('/login')}}" class="form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="inputBox">
            <input type="text" name="email" required="">
            <label class="label">Email</label>
        </div>
        <div class="inputBox">
            <input type="password" name="password" required="">
            <label class="label">Password</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="./reset" name="forget">Quên mật khẩu</a>
    <a href="./signup" name="signup">Đăng ký</a>
</div>

</body>
</html>