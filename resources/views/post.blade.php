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

        <div class="row">
            <div  class="col-sm-6 tilte">
                <p>Đăng thông tin học bổng</p>
            </div>
        </div>
        <div class="row">
            <div  class="col-sm-9">
                <div class="card">
                    <div class="container">
                        <form class="bg" method="post" action="/posthb" enctype="multipart/form-data">
                            <div class="infor">
                                <div class="spacing">
                                    <div class="scholarshipname">
                                        <label>Tên học bổng :</label>
                                        <input type="text" name="tenhb">
                                        <label>Loại học bổng *</label>
                                        <select name="loaihb">
                                            @foreach($loaihb as $loaihbb){
                                            <option value={{$loaihbb->id_LoaiHb}}>{{$loaihbb->TenLoaiHb}}</option>
                                            }@endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="subject">
                                        <label>Ngành học :</label>
                                        <select name="nganhhoc">
                                            @foreach($nganhhoc as $nganhhocb){
                                            <option value={{$nganhhocb->id_NganhHoc}}>{{$nganhhocb->TenNganhHoc}}</option>
                                            }@endforeach
                                        </select>
                                        <label>Bậc học :</label>
                                        <select name="bachoc">
                                            @foreach($bachoc as $bachocc){
                                            <option value={{$bachocc->id_BacHoc}}>{{$bachocc->TenBacHoc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="university">
                                        <label>Trường học :</label>
                                        <select name="truonghoc">
                                            @foreach($truonghoc as $truonghocb){
                                            <option value={{$truonghocb->id_TruongHoc}}>{{$truonghocb->TenTruongHoc}}</option>
                                            }@endforeach
                                        </select>
                                        <label>Giá trị :</label>
                                        <select name="donvitien">
                                            @foreach($donvitien as $donvitienb){
                                            <option value={{$donvitienb->id_DonVi}}>{{$donvitienb->TenDonVi}}</option>
                                            }@endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="soluong">
                                        <label>Giá trị học bổng thấp nhất :</label>
                                        <input type="number" name="sotienmin">
                                        <label>Giá trị học bổng cao nhất</label>
                                        <input type="number" name="sotienmax"><br>
                                    </div>
                                </div>

                                <div class="spacing">
                                    <div class="deadline">
                                        <label>Hạn chót :</label>
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
                                        <label>Link đăng ký :</label>
                                        <input type="link" name="link">
                                        <label>Số lượng</label>
                                        <input type="number" name="soluong"><br>
                                    </div>
                                </div>

                                <div class="spacing">
                                    <div class="coverimages">
                                        <label>Ảnh bìa :</label>
                                        <input type="file" name="coverimage" ><br>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="request">
                                        <div class="form-group green-border-focus">
                                            <label>Yêu cầu :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea5" rows="5" name="yeucau"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="spacing">
                                    <div class="request">
                                        <div class="form-group green-border-focus">
                                            <label>Thủ tục nộp đơn :</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea5" rows="5" name="thutuc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="cen">
                                    <div class="buttonbot">
                                        <input  name="_token" type="hidden" value="{{ csrf_token() }}" style="visibility:hidden;">
                                        <button type="submit">Submit</button>
                                        <button type="reset">Cancel</button>
                                    </div>

                                </div>
                            </div>
                    </form>
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