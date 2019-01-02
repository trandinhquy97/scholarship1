<div class="widget-body">
            <form action="@if(!empty($scholar)){{Request::url()}}@else{{'manage/scholarship/new'}}@endif" class="form" method="post" enctype="multipart/form-data">
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-quote-right
"></i>Tên học bổng</label>
                    <div class="col-lg-6">
                        <input type="text" required="true" class="form-control" placeholder="Tên học bổng" 
                        value="@if(!empty($scholar)){{$scholar->TenHocBong}}@endif"
                         name="namescholar">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-5 form-control-label d-flex justify-content-lg-end"><i class="la la-tag
"></i>Loại bọc bổng</label>
                            <div class="col-lg-5 select mb-3">
                                <select required="true" name="typescholar" class="custom-select form-control">
                                    @foreach($typescholar as $type)
                                        <option value="{{$type->id_LoaiHb}}" 
                                            @if(!empty($scholar) && $type->id_LoaiHb==$scholar->id_LoaiHb){{'selected'}}@endif
                                            >{{$type->TenLoaiHb}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-industry
"></i>Ngành học</label>
                            <div class="col-lg-9 select mb-3">
                                <select required="true" name="majorscholar" class="custom-select form-control">
                                    @foreach($majorscholar as $major)
                                        <option value="{{$major->id_NganhHoc}}"
                                            @if(!empty($scholar) && $major->id_NganhHoc==$scholar->id_NganhHoc){{'selected'}}@endif
                                            >{{$major->TenNganhHoc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-graduation-cap
"></i>Bậc học</label>
                            <div class="col-lg-9 select mb-3">
                                <select required="true" name="levelscholar" class="custom-select form-control">
                                    @foreach($levelscholar as $lvl)
                                        <option value="{{$lvl->id_BacHoc}}"
                                            @if(!empty($scholar) && $lvl->id_BacHoc==$scholar->id_BacHoc){{'selected'}}@endif
                                            >{{$lvl->TenBacHoc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-bank
"></i>Trường học</label>
                    <div class="col-lg-9 select mb-3">
                        <select required="true" name="school" class="custom-select form-control">
                            @foreach($school as $sc){
                                <option value="{{$sc->id_TruongHoc}}"
                                    @if(!empty($scholar) && $sc->id_TruongHoc==$scholar->id_TruongHoc){{'selected'}}@endif
                                    >{{$sc->TenTruongHoc}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-ticket
"></i>Giá trị học bổng</label>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Số lượng suất</label>
                        <input type="number" required="true" value="@if(!empty($scholar)){{$scholar->SoLuong}}@endif" class="form-control" placeholder="Số lượng suất học bổng" name="numscholar">
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Thấp nhất</label>
                        <input type="number" required="true" value="@if(!empty($value)){{$value->SoTienMin}}@else{{'0'}}@endif" class="form-control" placeholder="Giá trị" name="minval">
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Cao nhất</label>
                        <input type="number" required="true" value="@if(!empty($value)){{$value->SoTienMax}}@else{{'0'}}@endif" class="form-control" placeholder="Giá trị" name="maxval">
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-dollar
"></i>Đơn vị</label>
                        <select name="unit" class="custom-select form-control">
                            @foreach($unit as $un)
                                <option value="{{$un->id_DonVi}}"

                                    >{{$un->TenDonVi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Begin Page Vendor Js -->
                <script src="assets/vendors/js/datepicker/moment.min.js"></script>
                <script src="assets/vendors/js/datepicker/daterangepicker.js"></script>
                <!-- End Page Vendor Js -->
                <!-- Begin Page Snippets -->
                <script src="assets/js/components/datepicker/datepicker.js"></script>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-3 form-control-label"><i class="la la-calendar"></i>Hạn chót</label>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text"  required="true" value="@if(!empty($deadline)){{$deadline}}@endif" class="form-control" name="deadline" id="date" placeholder="Select value">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-photo"></i>Ảnh bìa</label>
                    <div class="col-lg-9">
                        <div class="form-group">
                    <div class="input-group input-file" name="Fichier1">
                        <input type="text" @if(empty($scholar)){{'required="true"'}}@endif id="photo" name="photo" class="form-control" placeholder='Choose a file...' />
                    </div>
                </div>
            </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        // Khai báo số Input tối đa
                        var maxField = 10; 
                        // HTML append
                        var getView = (num) => {
                            var fieldHTML = '<div class="form-group row d-flex align-items-center mb-5"><div class="col-md-3"><label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Chứng chỉ</label><select name="certificate'+num+'" class="custom-select form-control"><option value="1">C1</option> <option value="2">B2</option> <option value="3">A2</option> <option value="4">B1</option> <option value="5">C2</option> <option value="6">IELTS</option> <option value="7">TOEIC</option> <option value="8">TSE</option> <option value="9">TWE</option> <option value="10">STAMP 4S</option> <option value="11">STAMP 4Se</option> <option value="12">TEF</option> <option value="13">TCF</option> <option value="14">TFI</option> <option value="15">DELF</option> <option value="16">DALF</option> <option value="17">ECL</option> <option value="18">TECL</option> <option value="19">ACTFL</option> <option value="20">CLE</option> <option value="21">STAMP</option> <option value="22">DSH</option> <option value="23">TELC</option> <option value="24">ZD</option> <option value="25">ZDfB</option> <option value="26">ECL</option> <option value="27">A1</option> <option value="28">A2</option> <option value="29">B1</option> <option value="30">B2</option> <option value="31">C1</option> <option value="32">C2</option> <option value="33">FLPE</option> <option value="34">ACTFL</option> <option value="35">CLE</option> <option value="36">KGP</option> <option value="37">TELC</option> <option value="38">CILS</option> <option value="39">CELI</option> <option value="40">PLIDA</option> <option value="41">TELC</option> <option value="42">AIL</option> <option value="43">ACTFL</option> <option value="44">JLPT</option> <option value="45">BJT</option> <option value="46">EJU</option> <option value="47">STAMP 4S</option> <option value="48">STAMP 4Se</option> <option value="49">KPE</option> <option value="50">TOPIK</option> <option value="51">ACTFL</option> <option value="52">STAMP</option> <option value="53">HSK</option> <option value="54">TOCFL</option> <option value="55">ACTFL</option> <option value="56">CLE</option> <option value="57">TSC</option> <option value="58">BCT</option> <option value="59">TRFL</option> <option value="60">TELC</option> <option value="61">FLPE</option> <option value="62">SIELE</option> <option value="63">CELA</option> <option value="64">CELU</option> <option value="65">DELR</option> <option value="66">ECL</option> <option value="67">OPIc - ACTFL/LTI</option> <option value="68">TELC</option> <option value="69">TISUS</option> <option value="70">ACTFL</option> <option value="71">VINAFEST</option> <option value="72">NLTV</option> <option value="73">IVPT</option></select></div><div class="col-md-3"><label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Số điểm</label><input type="number" required="true" class="form-control" placeholder="Giá trị" name="langpoint'+num+'"></div><div class="col-md-3"><i class="ti-minus remove_button"></i></div></div>';
                            return fieldHTML;
                        }
                        console.log('remove')
                        var x = 1; 
                        $('.add_button').click(function(){
                            if(x < maxField){
                                x++;
                                $('#numCerti').val(x+'');
                                $('.form-wrapper').append(getView(x));
                            }
                            return false;
                        });
                        
                        $(document).on('click', '.remove_button', function(e){ 
                            e.preventDefault();
                            console.log($(this).parent('.col-md-3').parent('.form-group'));
                            $(this).parent('.col-md-3').parent('.form-group').remove();
                            console.log('remove')
                            x--;
                            $('#numCerti').val(x+'');
                        });
                    });
                </script>
                <div class="form-wrapper">
                    <div class="form-group row d-flex align-items-center mb-5">
                        <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="ti-medall-alt
"></i>Yêu cầu ngoại ngữ</label>
                        <input  id="numCerti" name="numCerti" type="hidden" value="@if(!empty($scholar)){{count($cert)}}@else{{'1'}}@endif">
                        </div>
                    </div>
                    @if(!empty($cert))
                        @php ($i = 0)
                        @foreach($cert as $c)
                        <div class="form-group row d-flex align-items-center mb-5">
                            <div class="col-md-3">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Chứng chỉ</label>
                                    <select name="certificate{{++$i}}" class="custom-select form-control">
                                        @foreach($certificate as $cer)
                                            <option value="{{$cer->id_ChungChi}}" @if($c->id_ChungChi==$cer->id_ChungChi){{'selected'}}@endif>{{$cer->TenChungChi}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-3">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Số điểm</label>
                                    <input type="number" required="true" value="{{$c->Diem}}" class="form-control" placeholder="Giá trị" name="langpoint{{$i}}">
                            </div>
                            <div class="col-md-3">
                                    @if($i==1)
                                    <i class="ti-plus add_button"></i>
                                    @else
                                    <i class="ti-minus remove_button"></i>
                                    @endif
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="form-group row d-flex align-items-center mb-5">
                            <div class="col-md-3">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Chứng chỉ</label>
                                    <select name="certificate1" class="custom-select form-control">
                                        @foreach($certificate as $cer)
                                            <option value="{{$cer->id_ChungChi}}">{{$cer->TenChungChi}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-3">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Số điểm</label>
                                    <input type="number" required="true" class="form-control" placeholder="Giá trị" name="langpoint">
                            </div>
                            <div class="col-md-3">
                                    <i class="ti-plus add_button"></i>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="spacing">
                    <div class="request">
                        <div class="form-group green-border-focus">
                            <label><i class="la la-list-alt"></i>Yêu cầu</label>
                            <textarea class="form-control"  id="exampleFormControlTextarea5" required="true" rows="5" name="require">@if(!empty($scholar)){{$scholar->YeuCau}}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="spacing">
                    <div class="request">
                        <div class="form-group green-border-focus">
                            <label><i class="la la-paste"></i>Thủ tục nộp đơn</label>
                            <textarea class="form-control" id="exampleFormControlTextarea5" required="true" rows="5" name="pro">@if(!empty($scholar)){{$scholar->ThuTucNop}}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-envelope"></i>Link đăng ký</label>
                    <div class="col-lg-6">
                        <input type="text" required="true" value="@if(!empty($scholar)){{$scholar->LinkDangKy}}@endif" class="form-control" placeholder="Link đăng ký" name="linkreg">
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-info-circle
"></i>Nguồn thông tin</label>
                    <div class="col-lg-6">
                        <input type="text" required="true" value="@if(!empty($scholar)){{$scholar->NguonThongTin}}@endif" class="form-control" placeholder="Nguồn thông tin" name="linkvia">
                    </div>
                </div>
                <div class="text-right">
                    <input  name="_token" type="hiden" value="{{ csrf_token() }}" style="visibility:hidden;">
                    <button class="btn btn-shadow mr-1 mb-2" type="reset">Reset</button>
                    <button class="btn btn-gradient-01" type="submit">@if(!empty($scholar)){{'Lưu'}}@else{{'Tạo'}}@endif</button>
                </div>
            </form>
        </div>