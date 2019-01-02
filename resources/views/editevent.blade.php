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
    <h2><b>Sửa sự kiện</b></h2>
</div>
@if(!empty($status))
@endif
<div class="widget-body">
    <form action="manage/post/edit/{{$id}}" class="form" method="post" enctype="multipart/form-data">
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-quote-right
"></i>Tên sự kiện</label>
            <div class="col-lg-6">
                <input type="text" required="true" class="form-control" placeholder="Tên sự kiện" name="nameevent" value="{{$event->TenSuKien}}">
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-paper-plane
"></i>Tiêu đề bài đăng</label>
            <div class="col-lg-6">
                <input type="text" required="true" class="form-control" placeholder="Tiêu đề bài đăng" name="namepost" value="{{$event->TieuDeBaiDang}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-5 form-control-label d-flex justify-content-lg-end"><i class="la la-tag
"></i>Loại sự kiện</label>
                    <div class="col-lg-5 select mb-3">
                        <select required="true" name="typeevent" class="custom-select form-control">
                            @foreach($typeevent as $type)
                            @if($event->id_LoaiSuKien==$type->id_LoaiSuKien)
                                <option value="{{$type->id_LoaiSuKien}}" selected>{{$type->TenLoaiSuKien}}</option>
                            @else
                                <option value="{{$type->id_LoaiSuKien}}">{{$type->TenLoaiSuKien}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-industry
"></i>Thành phố</label>
                    <div class="col-lg-9 select mb-3">
                        <select required="true" name="city" class="custom-select form-control">
                            @foreach($cities as $city)
                            @if($event->id_ThanhPho==$city->id_ThanhPho)
                                <option value="{{$city->id_ThanhPho}}" selected>{{$city->TenThanhPho}}</option>
                            @else
                            <option value="{{$city->id_ThanhPho}}">{{$city->TenThanhPho}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/datepicker/moment.min.js"></script>
        <script src="assets/vendors/js/datepicker/daterangepicker.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="assets/js/components/datepicker/datepicker.js"></script>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label"><i class="ti-direction"></i>Thời gian đăng ký</label>
            <div class="col-lg-9">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="daterange" placeholder="Select value" name="daterange">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label"><i class="ti-direction-alt"></i>Thời gian diễn ra</label>
            <div class="col-lg-9">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="datetime" placeholder="Select value" name="datetime">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-map-marker
"></i>Địa điểm</label>
            <div class="col-lg-6">
                <input type="text" required="true" class="form-control" placeholder="Địa điểm diễn ra" name="address" value="{{$event->DiaDiem}}">
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-certificate"></i>Giải thưởng</label>
            <div class="col-lg-6">
                <input type="text" required="true" class="form-control" placeholder="Giải thưởng" name="award" value="{{$event->GiaiThuong}}">
            </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-5">
            {{--<label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-photo"></i>Ảnh bìa</label>--}}
            {{--<div class="col-lg-9">--}}
                {{--<div class="form-group">--}}
                    {{--<div class="input-group input-file" name="Fichier1">--}}
                        {{--<input type="text" required="true" name="photo" class="form-control" placeholder='Choose a file...' />--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="spacing">
                    <div class="request">
                        <div class="form-group green-border-focus">
                            <label><i class="la la-paste"></i>Nội dung sự kiện</label>
                            <textarea class="form-control" id="exampleFormControlTextarea5" required="true" rows="5" name="content">{{$event->NoiDung}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-envelope"></i>Link đăng ký</label>
                    <div class="col-lg-6">
                        <input type="text" required="true" class="form-control" placeholder="Link đăng ký" name="link" value="{{$event->LinkDangKy}}">
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-info-circle
"></i>Nguồn thông tin</label>
                    <div class="col-lg-6">
                        <input type="text" required="true" class="form-control" placeholder="Nguồn thông tin" name="source" value="{{$event->NguonThongTin}}">
                    </div>
                </div>
                <div class="text-right">
                    <input  name="_token" type="hiden" value="{{ csrf_token() }}" style="visibility:hidden;">
                    <button class="btn btn-shadow mr-1 mb-2" type="reset">Reset</button>
                    <button class="btn btn-gradient-01" type="submit">Tạo</button>
                </div>
            </div>

    </form>
</div>
</body>
</html>