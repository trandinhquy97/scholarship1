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
@include('header')

<!-- Hết menu -->


<!-- Hết phần head -->

Mọi chi tiết xin liên hệ:
<br> Messenger
    <a class="outside" href="https://www.facebook.com/messages/t/2593606507319847"><i class="fab fa-facebook-f"></i>https://www.facebook.com/messages/t/2593606507319847</a>
<br> Điện thoại
    <a class="outside" href="+tel:84347723485"><i class="fas fa-phone-volume"></i>84347723485</a>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<!-- Hết phần các mục -->


@include('footer')
<!-- Xong phần footer -->

</body>
</html>