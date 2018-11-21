<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <base href="/">
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
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.css">
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
</nav>
<!-- Hết menu -->


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