<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <base href="/">
    <meta charset="utf-8">
    <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- <link rel="stylesheet" href="vendor/bootstrap.css"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/img/favicon-16x16.png')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/personalpage.css">
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.css">


</head>
<body >
<!-- Hết menu -->
<div class="page db-social about">
    <div class="page-content d-flex align-items-stretch">

    <!-- End Left Sidebar -->
    <!-- Begin Content -->
    <div class="content-inner compact">
        <div class="jumbotron jumbotron-fluid"></div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <!-- Start Head Profile -->
                    <div class="justify-content-center">
                        <div class="image-default">
                            <img class="rounded-circle" src="assets/img/avatar/avatar-01.jpg" alt="...">
                        </div>
                        <div class="infos">
                            <h1><B>{{$profile->HoVaTen}}</B></h1>
                            <div class="location">{{$email}}</div>
                        </div>
                    </div>
                    <!-- End Head Profile -->
                    <div class="row flex-row">
                        <div class="col-xl-5">
                            <!-- Begin Widget -->
                            <div class="widget has-shadow">
                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h3>THÔNG TIN CHUNG</h3>
                                </div>
                                <div class="widget-body">
                                    {{--<div class="about-infos d-flex flex-column">--}}
                                        {{--<div class="about-title">Giới thiệu về bản thân:</div>--}}
                                        {{--<div class="about-text">--}}
                                            {{--Hi, I'm David lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque imperdiet in sem sed condimentum. Nullam vehicula iaculis orci ac facilisis.--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Ngày sinh:</div>
                                        <div class="about-text">{{$profile->NgaySinh }}</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Nơi đang sống:</div>
                                        <div class="about-text">{{$profile->QueQuan }}</div>
                                    </div>

                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Giới tính:</div>
                                        <div class="about-text">@if($profile->GioiTinh  ==0) Nam @else Nữ @endif </div>
                                    </div>
                                    {{--<div class="about-infos d-flex flex-column">--}}
                                        {{--<div class="about-title">Occupation:</div>--}}
                                        {{--<div class="about-text">UX Designer</div>--}}
                                    {{--</div>--}}
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Link of CV:</div>
                                        <div class="about-text">{{$profile->LinkCV}}</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Email:</div>
                                        <div class="about-text">{{$email}}</div>
                                    </div>

                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Số điện thoại:</div>
                                        <div class="about-text">{{$profile->SDT}}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <!-- Begin Column -->
                        {{--<div class="col-xl-7 column">--}}
                            {{--<!-- Begin Education -->--}}
                            {{--<div class="widget has-shadow">--}}
                                {{--<div class="widget-header bordered no-actions d-flex align-items-center">--}}
                                    {{--<h3>GIÁO DỤC</h3>--}}
                                {{--</div>--}}
                                {{--<div class="widget-body">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 about-infos d-flex flex-column">--}}
                                            {{--<div class="about-title">The Art Institute (Atlanta):</div>--}}
                                            {{--<div class="date">2005 - 2006</div>--}}
                                            {{--<div class="about-text">Cras semper turpis arcu, in accumsan elit sagittis et. Nulla sed trnibh, vehicula blandit massa</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 about-infos d-flex flex-column">--}}
                                            {{--<div class="about-title">Epitech (Paris):</div>--}}
                                            {{--<div class="date">2003 - 2005</div>--}}
                                            {{--<div class="about-text">In et molestie risus. Etiam efficitur enim sit amet porttitor Nulla fermentum laoreet ipsum, vehicula</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 about-infos d-flex flex-column">--}}
                                            {{--<div class="about-title">School of Visual Arts (Chicago):</div>--}}
                                            {{--<div class="date">2001 - 2003</div>--}}
                                            {{--<div class="about-text">Quisque tincidunt, dui efficitur elementum faucibus, est nunc ultricies lacus, et mattis neque nisi sollicitudin</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 about-infos d-flex flex-column">--}}
                                            {{--<div class="about-title">The Fake School:</div>--}}
                                            {{--<div class="date">2000 - 2001</div>--}}
                                            {{--<div class="about-text">Cras semper turpis arcu, in accumsan elit sagittis et. Nulla sed tristique nibh, vehicula blandit massa</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- End Education -->--}}
                            {{--<!-- Begin Eployement -->--}}

                            {{--<!-- End Eployement -->--}}
                            {{--<!-- Begin Hobbies & Interest -->--}}
                            {{--<div class="widget has-shadow">--}}
                                {{--<div class="widget-header bordered no-actions d-flex align-items-center">--}}
                                    {{--<h3>SỞ THÍCH VÀ SỰ QUAN TÂM</h3>--}}
                                {{--</div>--}}
                                {{--<div class="widget-body">--}}
                                    {{--<div class="d-flex justify-content-center">--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Camping">--}}
                                                    {{--<i class="ion-bonfire"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Photography">--}}
                                                    {{--<i class="ion-camera"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Music">--}}
                                                    {{--<i class="ion-headphone"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Travel">--}}
                                                    {{--<i class="ion-map"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="d-flex justify-content-center">--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Food">--}}
                                                    {{--<i class="ion-icecream"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Paint">--}}
                                                    {{--<i class="ion-paintbrush"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Nature">--}}
                                                    {{--<i class="ion-leaf"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="hobbies">--}}
                                            {{--<div class="hobbies-icon">--}}
                                                {{--<a href="#" title="Coffee">--}}
                                                    {{--<i class="ion-coffee"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <!-- End Hobbies & Interest -->
                        </div>
                        <!-- End Column -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->

    </div>
    <!-- End Content -->
</div>
<!-- End Page Content -->
</div>
<!-- Begin Vendor Js -->
<script src="assets/vendors/js/base/jquery.min.js"></script>
<script src="assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->




<!-- Xong phần footer -->

</body>
</html>