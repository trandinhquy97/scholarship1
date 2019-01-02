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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
        <link rel="stylesheet" type="text/css" href="css/newpost.css">
        <script type="text/javascript">
            function bs_input_file() {
                $(".input-file").before(
                    function() {
                        if ( ! $(this).prev().hasClass('input-ghost') ) {
                            var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                            element.attr("name",$(this).attr("name"));
                            element.change(function(){
                                element.next(element).find('input').val((element.val()).split('\\').pop());
                            });
                            $(this).find("button.btn-choose").click(function(){
                                element.click();
                            });
                            $(this).find("button.btn-reset").click(function(){
                                element.val(null);
                                $(this).parents(".input-file").find('input').val('');
                            });
                            $(this).find('input').css("cursor","pointer");
                            $(this).find('input').mousedown(function() {
                                $(this).parents('.input-file').prev().click();
                                return false;
                            });
                            return element;
                        }
                    }
                );
            }
            $(function() {
                bs_input_file();
            });
        </script>
    </head>
    <body>
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h2><b>Đăng bài viết học bổng mới</b></h2>
        </div>
        @if(!empty($status))
        @endif
        @include('newpostform')
    </body>   
</html>