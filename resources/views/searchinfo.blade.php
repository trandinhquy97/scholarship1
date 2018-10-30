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
    <link rel="stylesheet" href="{{URL::asset('css/searchinfo.css')}}">
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
<nav class="navbar navbar-light bg-faded navbar-fixed-top delete-margin" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img src="{{URL::asset('css/pictures/icon.png')}}" alt="">
        </a>
    </div>

    <ul class="nav navbar-nav itemsinnav">
        <li class="nav-item">
            <a class="nav-link" href="#">HỌC BỔNG</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">CUỘC THI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">WORKSHOP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">LIÊN HỆ</a>
        </li>
    </ul>

    <ul class="nav navbar-nav ml-auto leftitemsinnav">
        <input type="text" class="searchbar">
        <li class="nav-item btnsearch">
            <button><i class="fas fa-search white"></i></button>
        </li>
        <li class="nav-item btnlogin">
            <i class="fas fa-user-alt white"></i>
            <a class="nav-link white" href="#">Login</a>
        </li>
    </ul>
</nav>

<!-- Hết menu -->

<div class="mainhead">
    <div class="box">
        <h2 class="head">Khám phá những cơ hội mới</h2>
        <form action="" class="form">
            <div class="topBox">
                <select name="country" id="country">
                    <option value="0">Mỹ</option>
                    <option value="1">Anh</option>
                    <option value="2">Pháp</option>
                </select>
                <select name="level" id="level">
                    <option value="0">Đại học</option>
                    <option value="1">Thạc sĩ</option>
                </select>
            </div>
            <div class="inputBox">
                <input type="password" name="password" placeholder="Tìm kiếm">
            </div>

            <button type="submit" class="">Submit</button>
        </form>
    </div>
</div>

<!-- Hết phần head -->
<div class="filter-contain">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 left">
                <button>NỔI BẬT</button>
                <button>MỚI NHẤT</button>
            </div>
            <div class="col-sm-4 mid">
                <select name="contry" id="contry">
                    <option value="0">Mỹ</option>
                    <option value="1">Anh</option>
                    <option value="2">Pháp</option>
                </select>
                <select name="level" id="level">
                    <option value="0">Đại học</option>
                    <option value="1">Thạc sĩ</option>
                </select>
            </div>
            <div class="col-sm-4 right">
                <button></button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
            </div>
        </div>
        <!-- <div class="left">
            <button>NỔI BẬT</button>
            <button>MỚI NHẤT</button>
        </div>
        <div class="mid">
            <select name="contry" id="contry">
                <option value="0">Mỹ</option>
                <option value="1">Anh</option>
                <option value="2">Pháp</option>
            </select>
            <select name="level" id="level">
                <option value="0">Đại học</option>
                <option value="1">Thạc sĩ</option>
            </select>
        </div>
        <div class="right">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div> -->
    </div>
</div>
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




<div class="footer">
    <div class="bg"></div>
    <div class="blur"></div>
    <div class="row">
        <div class="col-sm-4">
            <h2>Follow us</h2>
            <div class="lower">
                <a class="outside" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="outside" href=""><i class="fab fa-youtube"></i></a>
                <a class="outside" href=""><i class="fas fa-phone-volume"></i></a>
            </div>
        </div>
        <div class="col-sm-8">
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
            <a href="" class="reflink">học bổng</a>
        </div>
    </div>
    <p class="r">Copyright © All Rights reserved</p>
</div>
<!-- Xong phần footer -->

</body>
</html>