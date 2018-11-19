<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Stylesheet -->
    {{-- <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css"> --}}
    <link rel="stylesheet" href="sidebar.css">
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
        <style type="text/css">
            .head{
                height: 100vh;display:flex; flex-direction:column;
            }
        </style>
        
</head>
<body >
    <div class="head">
        @include('header')
        <iframe src="/dashpage"  frameborder="0" width="100%" style="overflow:hidden;flex:1;padding-bottom:75px;"></iframe>
    </div>
    @include('footer')
    <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
</body>
</html>