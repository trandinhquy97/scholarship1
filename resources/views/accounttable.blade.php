<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <base href="/">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Elisyam - Datatables</title>
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

          
        </script>
        <script type="text/javascript" src="js/dashboard.js"></script>
        
        <!-- Stylesheet -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="assets/css/datatables/datatables.min.css">
    </head>
    <body>
    
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h2><b>Quản lý tài khoản hệ thống</b></h2>
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
                            <th>User ID</th>
                            <th>Tên tài khoản</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th><span style="width:100px;">Trạng thái</span></th>
                            <th>Loại tài khoản</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accounts as $value)
                        <tr>
                            <td><span class="text-primary">{{$value->id}}</span></td>
                            <td>{{str_limit($value->username, 24)}}</td>
                            <td>Nam</td>
                            <td>{{str_limit($value->email, 32)}}</td>
                            @switch($value->id_TrangThai)
                                @case(1)
                                    @php ($c = 'success')
                                    @php ($status = 'Hoạt động')
                                    @php ($b = 'la-lock')
                                    @break
                                @case(0)
                                    @php ($c = 'danger')
                                    @php ($status = 'Khóa')
                                    @php ($b = 'la-unlock-alt')
                                    @break;
                            @endswitch
                            <td><span style="width:100px;" id="st{{$value->id}}"><span class="badge-text badge-text-small {{$c}}" >{{$status}}</span></span></td>
                            <td id="rl{{$value->id}}" rlid={{$value->kt_Quyen}}>{{$value->TenQuyen}}</td>
                            <td class="td-actions">
                                <a class="btn-upg" id="{{$value->id}}"><i class="la la-user-plus delete
"></i></a>
                                <a class="btn-reset" id="{{$value->id}}"><i class="la ion-refresh delete"></i></a>
                                <a class="btn-ban" id="{{$value->id}}" value="{{$value->id_TrangThai}}"><i class="la {{$b}} delete"></i></a>
                                <a class="btn-del" id="{{$value->id}}"><i class="la ion-alert-circled delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="..." class="pull-right">
                    {!! $accounts->render() !!}
                </nav>
            </div>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
          <div class="modal-dialog modal-l">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Bạn có muốn xóa tài khoản này không?</h4>
              </div>
              <div class="modal-center" style="width:50%;margin: 0 auto;text-align:center;"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="modal-btn-yes">OK</button>
                <button type="button" class="btn btn-default" id="modal-btn-no">Hủy</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- End Sorting -->
</body>   
</html>