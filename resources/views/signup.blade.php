<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <script type="text/javascript" src="signup.js"></script>
    <link rel="stylesheet" href="{{URL::asset('css/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/signup.css')}}">
</head>
<body >
<div class="box">
    <h2 class="head">Đăng ký</h2>
    <form action="{{url('/signup')}}" class="form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="inputBox">
            <input type="text" name="username" required="">
            <label class="label">Tên</label>
        </div>
        <div class="inputBox">
            <input type="text" name="email" required="">
            <label class="label">Email</label>
        </div>
        <div class="inputBox">
            <input type="password" name="password" required="">
            <label class="label">Password</label>
        </div>
        <div class="inputBox">
            <input type="password" name="repassword" required="">
            <label class="label">Nhập lại password</label>
        </div>
        <div class="inputBox">
            <select name="type">
                <option value="1">Sinh viên</option>
                <option value="2">Tổ chức</option>
            </select>
            <label class="label">Loại tài khoản</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="./login" name="forget">Đăng nhập</a>
</div>

</body>
</html>