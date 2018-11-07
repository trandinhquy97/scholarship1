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
    <link rel="stylesheet" href="{{URL::asset('css/post.css')}}">
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
<div class="mainhead">
    <div class="box">
        <h2 class="head">Khám phá những cơ hội mới</h2>
        <form action="" class="form">
            <div class="topBox">
                <select name="country" id="country">
                    <option value="0" style="width: 5px">Mỹ</option>
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

<div class="post">
    <div class="container">
        <div class="row">
            <div  class="col-sm-6 tilte">
                <p>Đăng thông tin học bổng</p>
            </div>
        </div>
        <div class="row">
            <div  class="col-sm-10">
                <div class="card">
                    <div class="container">
                        <form class="bg" >
                            <div class="infor">
                                <div class="spacing">
                                    <div class="scholarshipname">
                                        <label>Tên học bổng:</label>
                                        <input type="text" name="tenhb">
                                        <label>Loại học bổng *</label>
                                        <select>
                                            <option value="nganhan">Ngắn hạn</option>
                                            <option value="daihan">Dài hạn</option>
                                            <option value="toanphan">Toàn phần</option>
                                            <option value="banphan">Bán phần</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spacing">

                                </div>
                                <div class="spacing">
                                    <div class="subject">
                                        <label>Ngành học:</label>
                                        <select  >
                                            <option value="cntt">Công nghệ thông tin</option>
                                            <option value="hoahoc">Hóa học</option>
                                            <option value="kinhte">Kinh tế</option>
                                            <option value="ngoaingu">Ngoại ngữ</option>
                                            <option value="cauduong">Xây dựng cầu đường</option>
                                            <option value="sinhhoc">Sinh học</option>
                                        </select>
                                        <label>Bậc học</label>
                                        <select>
                                            <option value="daihoc">Đại học</option>
                                            <option value="thacsy">Thạc sỹ</option>
                                            <option value="tiensy">Tiến sỹ</option>
                                            <option value="Saudaihoc">Sau đại học</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="university">
                                        <label>Trường học:</label>
                                        <input type="text" name="tentruong">
                                        <label>Quốc gia:</label>
                                        <input type="text" name="quocgia"><br>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="level">

                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="deadline">
                                        <label>Hạn chót nộp đơn:</label>
                                        <input type="date" name="deadline"><br>


                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                    </script>
                                </div>

                                <div class="spacing">
                                    <div class="link">
                                        <label>Link đăng ký:</label>
                                        <input type="link" name="link">
                                        <label>Số lượng</label>
                                        <input type="number" name="soluong"><br>
                                    </div>
                                </div>

                                <div class="spacing">
                                    <div class="coverimages">
                                        <label>Ảnh bìa:</label>
                                        <input type="file" name="coverimage" ><br>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="request">
                                        <div class="form-group green-border-focus">
                                            <label>Yêu cầu:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea5" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="cen">
                                    <div class="buttonbot">
                                        <button type="button" onclick="alert('Submited')">Submit</button>
                                        <button type="button" onclick="alert('Canceled!')">Cancel</button>
                                    </div>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
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
</div>
<!-- Xong phần footer -->

</body>
</html>