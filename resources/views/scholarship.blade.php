<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <!-- <link rel="stylesheet" href="vendor/bootstrap.css"> -->
    <link rel="stylesheet" href="{{URL::asset('css/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/scholarship.css')}}">
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

<!--HEADER-->
	@include('header')
<!-- Hết menu -->

<div class="mainhead">
    <div class="box">
        <h2 class="head">Khám phá những cơ hội mới</h2>
        <form action="" class="form">
            <div class="inputBox">
                <input type="text" name="search" placeholder="Tìm kiếm">
            </div>

            <button type="submit" class="">Submit</button>
        </form>
    </div>
</div>

<!-- Hết phần head -->

<div class="scholarshipbox">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 head">
                <p>học bổng</p>
            </div>
        </div>
        <div class="row">
            @foreach($scholarships as $scholarship)
                <div class="col-sm-6">
                    <div class="card">
                        <img class="card-img-top bg" src="{{URL::asset($scholarship->AnhBia)}}" alt="Card image cap">
                        <img class="country" src="{{URL::asset($scholarship->AnhQuocKy)}}" alt="">
                        <div class="blur"></div>
                        <p class="money">{{$scholarship->SoTienMax.$scholarship->TenDonVi}}</p>
                        <p class="date">{{date('d/m/Y', strtotime($scholarship->deadline))}}</p>
                        <div class="card-block">
                            <div class="textboxh4">
                                <h4 class="card-title">{{$scholarship->TenHocBong}}</h4>
                            </div>
                            <div class="textboxp">
                                <p class="card-text">Aliquam quis pulvinar purus. Etiam cursus ipsum quis enim faucibus, quis posuere orci ornare. Duis mattis sagittis fringilla.</p>
                            </div>
                            <a href="{{'/scholarship/'.$scholarship->id_HocBong}}" class="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pagination">
                {!! $scholarships->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- Hết phần các mục -->


<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




<!-- FOOTER -->
	@include('footer')
<!-- Xong phần footer -->

</body>
</html>