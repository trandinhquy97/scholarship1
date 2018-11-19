<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">


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
<!-- Hết menu -->
<div class="page-content d-flex align-items-stretch">

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