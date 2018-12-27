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
    <script type="text/javascript" src="js/dashboard.js"></script>
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
    <h2><b>Danh sách nộp hồ sơ học bổng: {!!$name->TenHocBong!!}</b></h2>
</div>
<div id="alert-return" class="alert alert-success alert-dismissible hidden">
    <a class="close" data-dismiss="alert" aria-label="close"></a>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
</div>
<div class="widget-body">
    <div class="table-responsive">
        <table id="sorting-table" class="table mb-0">
            <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Tên</th>
                <th>Ngày Sinh</th>
                <th>Quê quán</th>
                {{--<th>Th</th>--}}
            </tr>
            </thead>
            <tbody>
            @php
                $count = 0
            @endphp
            @foreach($registedperson as $rp)
                <tr>
                    <td><span class="text-primary">{!! ++$count !!}</span></td>
                    <td><a target="_blank" href="/manage/scholarship/personal/{!! $rp->id !!}">{!! $rp->HoVaTen !!}</a></td>
                    <td>{!! $rp->NgaySinh !!}</td>
                    <td>{!! $rp->QueQuan !!}</td>
                    {{--<td><span style="width:100px;"><span class="badge-text badge-text-small ">abc</span></span></td>--}}
                    {{--<td></td>--}}
                    {{--<td class="td-actions">--}}
                        {{--<a id="btn-watch" href="manage/scholarship/watchregist/abc"><i class="la la-edit edit"></i></a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--<nav aria-label="..." class="pull-right">--}}
            {{--{!! $articles->render() !!}--}}
        {{--</nav>--}}
        {{--<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">--}}
            {{--<div class="modal-dialog modal-l">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title" id="myModalLabel">Bạn có muốn xóa bài này không?</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-center" style="width:50%;margin: 0 auto;text-align:center;"></div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-primary" id="modal-btn-yes">OK</button>--}}
                        {{--<button type="button" class="btn btn-default" id="modal-btn-no">Hủy</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="container">
            <div class="row">
                <div class="col-sm-12 pagination">
                    {!! $registedperson->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Sorting -->
</body>
