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
            @foreach($search_scholarship_data as $search_datum)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top bg" src="{{URL::asset($search_datum->AnhBia)}}" alt="Card image cap">
                        <img class="country" src="{{URL::asset($search_datum->AnhQuocKy)}}" alt="">
                        <div class="blur"></div>
                        <p class="money">{{$search_datum->SoTienMax.$search_datum->TenDonVi}}</p>
                        <p class="date">{{date('d/m/Y', strtotime($search_datum->deadline))}}</p>
                        <div class="card-block">
                            <div class="textboxh4">
                                <h4 class="card-title">{{$search_datum->TenHocBong}}</h4>
                            </div>
                            <div class="textboxp">
                                <p class="card-text">Aliquam quis pulvinar purus. Etiam cursus ipsum quis enim faucibus, quis posuere orci ornare. Duis mattis sagittis fringilla.</p>
                            </div>
                            <a href="{{'/scholarship/'.$search_datum->id_HocBong}}" class="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 pagination">--}}
                {{--{!! $search_scholarship_data->links() !!}--}}
                {{--{!! $search_key !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="container">
        <div class="row">
            <div class="col-sm-5 head">
                <p>cuộc thi</p>
            </div>
        </div>
        <div class="row">
            @foreach($search_contest_data as $contest)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top bg" src="{{URL::asset($contest->AnhBia)}}" alt="Card image cap">
                        <img class="country" src="{{URL::asset($contest->AnhQuocKy)}}" alt="">
                        <div class="blur"></div>
                        <p class="money">{{$contest->GiaiThuong}}</p>
                        <p class="date">{{date('d/m/Y', strtotime($contest->ThoiGianKetThucDangKy))}}</p>
                        <div class="card-block">
                            <div class="textboxh4">
                                <h4 class="card-title">{{$contest->TieuDeBaiDang}}</h4>
                            </div>
                            <div class="textboxp">
                                <p class="card-text">Aliquam quis pulvinar purus. Etiam cursus ipsum quis enim faucibus, quis posuere orci ornare. Duis mattis sagittis fringilla.</p>
                            </div>
                            <a href="{{'/contests/'.$contest->id_SuKien}}" class="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 pagination">--}}
                {{--{!! $search_contest_data->links() !!}--}}
                {{--{!! $search_key !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container">
        <div class="row">
            <div class="col-sm-5 head">
                <p>workshop</p>
            </div>
        </div>
        <div class="row">
            @foreach($search_workshop_data as $contest)
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top bg" src="{{URL::asset($contest->AnhBia)}}" alt="Card image cap">
                        <img class="country" src="{{URL::asset($contest->AnhQuocKy)}}" alt="">
                        <div class="blur"></div>
                        <p class="money">{{$contest->GiaiThuong}}</p>
                        <p class="date">{{date('d/m/Y', strtotime($contest->ThoiGianKetThucDangKy))}}</p>
                        <div class="card-block">
                            <div class="textboxh4">
                                <h4 class="card-title">{{$contest->TieuDeBaiDang}}</h4>
                            </div>
                            <div class="textboxp">
                                <p class="card-text">Aliquam quis pulvinar purus. Etiam cursus ipsum quis enim faucibus, quis posuere orci ornare. Duis mattis sagittis fringilla.</p>
                            </div>
                            <a href="{{'/contests/'.$contest->id_SuKien}}" class="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pagination">
                @if($nummaxindex == 1)
                    {!! $search_scholarship_data->links() !!}
                @endif
                @if($nummaxindex == 2)
                    {!! $search_contest_data->links() !!}
                @endif
                @if($nummaxindex == 3)
                    {!! $search_workshop_data->links() !!}
                @endif
                {{--{!! $search_key !!}--}}
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