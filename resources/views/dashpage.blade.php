<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <base href="/">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Elisyam - Components Progress</title>
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
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="sidebar.css">
        <style type="text/css">
            .mainframe{
                padding-left: 240px;
                width: 100%;
                height: 100%;
                position: absolute;
                overflow:hidden;
            }
        </style>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>

    <body>
    <!-- Begin Page Content --> 
            <div class="page-content d-flex align-items-stretch" style="display: inline-block;">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <ul class="list-unstyled">
                            <li><a href="#dropdown-db" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Cá nhân</span></a>
                                <ul id="dropdown-db" class="collapse list-unstyled pt-0">
                                    <li><a href="/personal_info" target="mainside">Thông tin cá nhân</a></li>
                                    <li><a href="/personal_info_edit" target="mainside">Sửa thông tin cá nhân</a></li>
                                    <li><a href="/changepw" target="mainside">Đổi mật khẩu</a></li>
                                </ul>
                            </li>
                            @if($type == 5)
                            <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la ion-person-stalker
"></i><span>Quản lí tài khoản</span></a>
                                <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                                    <li><a href="/manage/account" target="mainside">Danh sách tài khoản</a></li>
                                    <li><a href="/manage/account/new" target="mainside">Thêm mới</a></li>
                                </ul>
                            </li>
                            @endif
                            @if($type != 1)
                            <li class=""><a href="#dropdown-ui" aria-expanded="false" data-toggle="collapse"><i class="la ti-files"></i><span>Quản lí học bổng</span></a>
                                <ul id="dropdown-ui" class="collapse list-unstyled pt-0">
                                    @if($type != 4 && $type != 6)
                                    <li><a href="/manage/scholarship" target="mainside">Danh sách học bổng</a></li>
                                    @endif
                                    @if($type ==3 || $type == 5 || $type == 6)
                                    <li><a href="/manage/scholarship/approval" target="mainside">Duyệt học bổng</a></li>
                                    @endif
                                    @if($type != 6)
                                    <li><a href="/manage/scholarship/new" target="mainside">Thêm mới</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                            @if($type != 1)
                            <li><a href="#dropdown-icons" aria-expanded="false" data-toggle="collapse"><i class="la ion-document-text
"></i><span>Quản lí bài đăng</span></a>
                                <ul id="dropdown-icons" class="collapse list-unstyled pt-0">
                                    @if($type != 4 && $type != 6)
                                    <li><a href="/manage/post" target="mainside">Danh sách bài đăng</a></li>
                                    @endif
                                    @if($type ==3 || $type == 5 || $type == 6)
                                    <li><a href="/manage/post/approval" target="mainside">Duyệt bài đăng</a></li>
                                    @endif
                                    @if($type != 6)
                                    <li><a href="/manage/post/new" target="mainside">Thêm mới</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                           {{--  @if($type == 2)
                                <li><a href="#dropdown-icons" aria-expanded="false" data-toggle="collapse"><i class="la la-font"></i><span>Quản lí bài đăng</span></a>
                                    <ul id="dropdown-icons" class="collapse list-unstyled pt-0">
                                        <li><a href="/manage/ownpost" target="mainside">Danh sách bài đăng</a></li>
                                        <li><a href="/manage/post/new" target="mainside">Thêm mới</a></li>
                                    </ul>
                                </li>
                            @endif --}}
                            @if($type == 3 || $type == 5 || $type == 6)
                                <li><a href="#dropdown-comments" aria-expanded="false" data-toggle="collapse"><i class="la la-font"></i><span>Quản lí bình luận</span></a>
                                    <ul id="dropdown-comments" class="collapse list-unstyled pt-0">
                                        <li><a href="/manage/comments" target="mainside">Bình luận học bổng</a></li>
                                        <li><a href="/manage/commentssevent" target="mainside">Bình luận bài đăng</a></li>
                                    </ul>
                                </li>
                            {{--<li><a href="/manage/comments" aria-expanded="false" target="mainside"><i class="la la-commenting"></i><span>Quản lí bình luận</span></a>--}}
                            {{--</li>--}}
                            @endif
                        </ul>
                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
            </div>
            <iframe name="mainside" src="/personal_info" class="mainframe" frameborder="0"></iframe>
            <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        </body>