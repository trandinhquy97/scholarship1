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
    <div class="content-inner compact">
        <!-- Begin Jumbotron -->
        <div class="jumbotron jumbotron-fluid"></div>
        <!-- End Jumbotron -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <!-- Start Head Profile -->
                    <div class="justify-content-center">
                        <div class="image-default">
                            <img class="rounded-circle" src="assets/img/avatar/avatar-01.jpg" alt="...">
                        </div>
                        <div class="infos">
                            <h1><B>Đỗ Minh Nhật</B></h1>
                            <div class="location">Las Vegas, Nevada, U.S.</div>
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
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Giới thiệu về bản thân:</div>
                                        <div class="about-text">
                                            Hi, I'm David lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque imperdiet in sem sed condimentum. Nullam vehicula iaculis orci ac facilisis.
                                        </div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Ngày sinh:</div>
                                        <div class="about-text">September 21, 1985</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Nơi đang sống:</div>
                                        <div class="about-text">Las Vegas, Nevada, U.S.</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Ngày tham gia:</div>
                                        <div class="about-text">Febuary 20, 2017</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Giới tính:</div>
                                        <div class="about-text">Male</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Occupation:</div>
                                        <div class="about-text">UX Designer</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Skills:</div>
                                        <div class="about-text">Photoshop, Illustrator, Javascript, HTML, CSS</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Email:</div>
                                        <div class="about-text">dgreen@email.com</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Website:</div>
                                        <div class="about-text">www.be-elisyam.com</div>
                                    </div>
                                    <div class="about-infos d-flex flex-column">
                                        <div class="about-title">Số điện thoại:</div>
                                        <div class="about-text">+00 987 654 32</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <!-- Begin Column -->
                        <div class="col-xl-7 column">
                            <!-- Begin Education -->
                            <div class="widget has-shadow">
                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h3>GIÁO DỤC</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="row">
                                        <div class="col-md-6 about-infos d-flex flex-column">
                                            <div class="about-title">The Art Institute (Atlanta):</div>
                                            <div class="date">2005 - 2006</div>
                                            <div class="about-text">Cras semper turpis arcu, in accumsan elit sagittis et. Nulla sed trnibh, vehicula blandit massa</div>
                                        </div>
                                        <div class="col-md-6 about-infos d-flex flex-column">
                                            <div class="about-title">Epitech (Paris):</div>
                                            <div class="date">2003 - 2005</div>
                                            <div class="about-text">In et molestie risus. Etiam efficitur enim sit amet porttitor Nulla fermentum laoreet ipsum, vehicula</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 about-infos d-flex flex-column">
                                            <div class="about-title">School of Visual Arts (Chicago):</div>
                                            <div class="date">2001 - 2003</div>
                                            <div class="about-text">Quisque tincidunt, dui efficitur elementum faucibus, est nunc ultricies lacus, et mattis neque nisi sollicitudin</div>
                                        </div>
                                        <div class="col-md-6 about-infos d-flex flex-column">
                                            <div class="about-title">The Fake School:</div>
                                            <div class="date">2000 - 2001</div>
                                            <div class="about-text">Cras semper turpis arcu, in accumsan elit sagittis et. Nulla sed tristique nibh, vehicula blandit massa</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education -->
                            <!-- Begin Eployement -->

                            <!-- End Eployement -->
                            <!-- Begin Hobbies & Interest -->
                            <div class="widget has-shadow">
                                <div class="widget-header bordered no-actions d-flex align-items-center">
                                    <h3>SỞ THÍCH VÀ SỰ QUAN TÂM</h3>
                                </div>
                                <div class="widget-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Camping">
                                                    <i class="ion-bonfire"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Photography">
                                                    <i class="ion-camera"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Music">
                                                    <i class="ion-headphone"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Travel">
                                                    <i class="ion-map"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Food">
                                                    <i class="ion-icecream"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Paint">
                                                    <i class="ion-paintbrush"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Nature">
                                                    <i class="ion-leaf"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hobbies">
                                            <div class="hobbies-icon">
                                                <a href="#" title="Coffee">
                                                    <i class="ion-coffee"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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