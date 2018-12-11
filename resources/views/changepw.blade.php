<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <base href="/">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Elisyam - Datatables</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        $(document).ready(function() {
            var modalConfirm = function(callback){
                console.log("hello");
              $(".btn-confirm").on("click", function(){
                console.log("hello");
                $("#mi-modal").modal('show');
              });

              $("#modal-btn-si").on("click", function(){
                callback(true);
                $("#mi-modal").modal('hide');
              });
              
              $("#modal-btn-no").on("click", function(){
                callback(false);
                $("#mi-modal").modal('hide');
              });
            };

            modalConfirm(function(confirm){
              if(confirm){
                //Acciones si el usuario confirma
                $("#result").html("CONFIRMADO");
              }else{
                //Acciones si el usuario no confirma
                $("#result").html("NO CONFIRMADO");
              }
            });
         });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="assets/css/datatables/datatables.min.css">
    </head>
    <body>
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h2><b>Đổi mật khẩu tài khoản</b></h2>
        </div>
        <div class="widget-body">
            <form>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Mật khẩu hiện tại</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" placeholder="Mật khẩu hiện tại" name="password">
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Mật khẩu mới</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" placeholder="Mật khẩu mới" name="passwordnew">
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Xác nhận mật khẩu mới</label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" name="passwordconf">
                    </div>
                </div>
                <div class="text-right">
                    <input  name="_token" type="hiden" value="{{ csrf_token() }}" style="visibility:hidden;">
                    <button class="btn btn-gradient-01" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    <!-- End Sorting -->
    </body>   
