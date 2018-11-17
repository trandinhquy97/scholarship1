<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="vendor/bootstrap.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <!-- <link rel="stylesheet" href="vendor/bootstrap.css"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/img/favicon-16x16.png')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('personalpage.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/css/base/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendors/css/base/elisyam-1.5.min.css')}}">


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
<div class="page-content d-flex align-items-stretch">
    <div class="compact-sidebar light-sidebar has-shadow">
        <!-- Begin Side Navbar -->
        <nav class="side-navbar box-scroll sidebar-scroll">
            <!-- Begin Main Navigation -->
            <ul class="list-unstyled">
                <li>
                    <a href="pages-newsfeed.html">
                        <i class="ti ti-receipt"></i><span>Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="app-chat.html">
                        <i class="ti ti-comments"></i><span>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="pages-friends.html">
                        <i class="ti ti-user"></i><span>Friends</span>
                    </a>
                </li>
                <li>
                    <a href="pages-groups.html">
                        <i class="ti ti-world"></i><span>Groups</span>
                    </a>
                </li>
                <li>
                    <a href="pages-events.html">
                        <i class="ti ti-calendar"></i><span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="ti ti-headphone"></i><span>Musics</span>
                    </a>
                </li>
                <li>
                    <a href="pages-albums.html">
                        <i class="ti ti-gallery"></i><span>Images</span>
                    </a>
                </li>
                <li>
                    <a href="pages-videos.html">
                        <i class="ti ti-control-play"></i><span>Videos</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="ti ti-stats-up"></i><span>Statistics</span>
                    </a>
                </li>
                <li>
                    <a href="db-default.html">
                        <i class="la la-angle-left"></i><span>Go Back</span>
                    </a>
                </li>
            </ul>
            <!-- End Main Navigation -->
        </nav>
        <!-- End Side Navbar -->
    </div>
    <!-- End Left Sidebar -->
    <!-- Begin Content -->
    <div class="content-inner profile">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title"><b>CHỈNH SỬA THÔNG TIN</b></h2>

                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row flex-row">
                <div class="col-xl-3">
                    <!-- Begin Widget -->
                    <div class="widget has-shadow">
                        <div class="widget-body">
                            <div class="mt-5">
                                <img src="assets/img/avatar/avatar-01.jpg" alt="..." style="width: 120px;" class="avatar rounded-circle d-block mx-auto">
                            </div>
                            <h3 class="text-center mt-3 mb-1">David Green</h3>
                            <p class="text-center">dgreen@example.com</p>
                            <div class="em-separator separator-dashed"></div>

                        </div>
                    </div>
                    <!-- End Widget -->
                </div>
                <div class="col-xl-9">
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>Chỉnh sửa thông tin</h4>
                        </div>
                        <div class="widget-body">
                            <div class="col-10 ml-auto">
                                <div class="section-title mt-3 mb-3">
                                    <h4>01. Thông tin cá nhân</h4>
                                </div>
                            </div>
                            <form class="form-horizontal">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Họ và tên</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="David Green">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Ngày sinh</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="date" placeholder="Select value">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Giới tính</label>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="styled-radio">
                                                <input type="radio" name="radio" id="rad-2" >
                                                <label for="rad-2">Nam</label><br>

                                            </div>
                                            <div class="styled-radio">

                                                <input type="radio" name="radio" id="rad-3" >
                                                <label for="rad-3">Nữ</label>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="dominhnhat2311@gmail.com">
                                    </div>
                                </div>
                            </form>
                            <div class="col-10 ml-auto">
                                <div class="section-title mt-3 mb-3">
                                    <h4>02. Thông tin địa chỉ và liên lạc</h4>
                                </div>
                            </div>
                            <form class="form-horizontal">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Quê quán</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="123 Century Blvd">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Địa chỉ</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="Los Angeles">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Số điện thoại</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" placeholder="0766800577">
                                    </div>
                                </div>

                            </form>
                            <div class="em-separator separator-dashed"></div>
                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="submit">Lưu</button>
                                <button class="btn btn-shadow" type="reset">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->
        <!-- Begin Page Footer-->
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
        <!-- End Page Footer -->
        <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
        <!-- Offcanvas Sidebar -->
        <div class="off-sidebar from-right">
            <div class="off-sidebar-container">
                <header class="off-sidebar-header">
                    <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                        <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                        <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                    </ul>
                    <a href="#off-canvas" class="off-sidebar-close"></a>
                </header>
                <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                    <div class="tab-content">
                        <!-- Begin Messenger -->
                        <div role="tabpanel" class="tab-pane show active fade" id="messenger" aria-labelledby="messenger-tab">
                            <!-- Begin Chat Message -->
                        </div>
                    </div>
                <!-- End Offcanvas Container -->
            </div>
            <!-- End Offsidebar Container -->
        </div>
        <!-- End Offcanvas Sidebar -->
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