<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <script type="text/javascript" src="searchinfo.js"></script>
    <!-- <link rel="stylesheet" href="vendor/bootstrap.css"> -->
    <link rel="stylesheet" href="{{URL::asset('css/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.css')}}">
    {{--<link rel="stylesheet" href="{{URL::asset('css/searchinfo.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('css/index.css')}}">
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btnsearch").hover(function(){
                    $(".searchbar").css("opacity","100");
                },
                function(){
                    $(".searchbar").css("opacity","0");
                });
            $(".searchbar").hover(function(){
                    $(".searchbar").css("opacity","100");
                },
                function(){
                    $(".searchbar").css("opacity","0");
                });


        });
    </script>
</head>
<body >
@include('header')

<!-- Hết menu -->

@include('mainhead')

<!-- Hết phần head -->
{{--<div class="filter-contain">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-4 left">--}}
                {{--<button>NỔI BẬT</button>--}}
                {{--<button>MỚI NHẤT</button>--}}
            {{--</div>--}}
            {{--<div class="col-sm-4 mid">--}}
                {{--<select name="contry" id="contry">--}}
                    {{--<option value="0">Mỹ</option>--}}
                    {{--<option value="1">Anh</option>--}}
                    {{--<option value="2">Pháp</option>--}}
                {{--</select>--}}
                {{--<select name="level" id="level">--}}
                    {{--<option value="0">Đại học</option>--}}
                    {{--<option value="1">Thạc sĩ</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<div class="col-sm-4 right">--}}
                {{--<button></button>--}}
                {{--<button></button>--}}
                {{--<button></button>--}}
                {{--<button></button>--}}
                {{--<button></button>--}}
                {{--<button></button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- <div class="left">--}}
            {{--<button>NỔI BẬT</button>--}}
            {{--<button>MỚI NHẤT</button>--}}
        {{--</div>--}}
        {{--<div class="mid">--}}
            {{--<select name="contry" id="contry">--}}
                {{--<option value="0">Mỹ</option>--}}
                {{--<option value="1">Anh</option>--}}
                {{--<option value="2">Pháp</option>--}}
            {{--</select>--}}
            {{--<select name="level" id="level">--}}
                {{--<option value="0">Đại học</option>--}}
                {{--<option value="1">Thạc sĩ</option>--}}
            {{--</select>--}}
        {{--</div>--}}
        {{--<div class="right">--}}
            {{--<button></button>--}}
            {{--<button></button>--}}
            {{--<button></button>--}}
            {{--<button></button>--}}
            {{--<button></button>--}}
            {{--<button></button>--}}
        {{--</div> -->--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Hết phần lọc -->
<div class="scholarshipbox">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 head">
                <p>học bổng</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top bg" src="http://placehold.it/600x120" alt="Card image cap">
                    <img class="country" src="{{URL::asset('css/pictures/usa.png')}}" alt="">
                    <div class="blur"></div>
                    <p class="money">2500$</p>
                    <p class="date">30/12/2019</p>
                    <div class="card-block">
                        <div class="textboxh4">
                            <h4 class="card-title">okyo company</h4>
                        </div>
                        <div class="textboxp">
                            <p class="card-text">Aliquam quis pulvinar purus. Etiam cursus ipsum quis enim faucibus, quis posuere orci ornare. Duis mattis sagittis fringilla.</p>
                        </div>
                        <a href="#" class="">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top bg" src="http://placehold.it/600x120" alt="Card image cap">
                    <img class="country" src="{{URL::asset('css/pictures/usa.png')}}" alt="">
                    <div class="blur"></div>
                    <p class="money">2500$</p>
                    <p class="date">30/12/2019</p>
                    <div class="card-block">
                        <div class="textboxh4">
                            <h4 class="card-title">okyo company</h4>
                        </div>
                        <div class="textboxp">
                            <p class="card-text">Aliquam quis pulvinar purus. Etiam cursus ipsum quis enim faucibus, quis posuere orci ornare. Duis mattis sagittis fringilla.</p>
                        </div>
                        <a href="#" class="">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hết phần các mục -->


<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




@include("footer")
<!-- Xong phần footer -->

</body>
</html>