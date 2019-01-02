<div class="widget-body">
            <form action="manage/scholar/new" class="form" method="post" >
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-quote-right
"></i>Tên học bổng</label>
                    <div class="col-lg-6">
                        <input type="text" required="true" class="form-control" placeholder="Tên học bổng" name="namescholar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-5 form-control-label d-flex justify-content-lg-end"><i class="la la-tag
"></i>Loại bọc bổng</label>
                            <div class="col-lg-5 select mb-3">
                                <select required="true" name="typescholar" class="custom-select form-control">
                                    @foreach($typescholar as $type){
                                        <option value="{{$type->id_LoaiHb}}">{{$type->TenLoaiHb}}</option>
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
                                    @foreach($majorscholar as $major){
                                        <option value="{{$major->id_NganhHoc}}">{{$major->TenNganhHoc}}</option>
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
                                    @foreach($levelscholar as $lvl){
                                        <option value="{{$lvl->id_BacHoc}}">{{$lvl->TenBacHoc}}</option>
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
                                <option value="{{$sc->id_TruongHoc}}">{{$sc->TenTruongHoc}}</option>
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
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Thấp nhất</label>
                        <input type="text" required="true" class="form-control" placeholder="Giá trị" name="minval">
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Cao nhất</label>
                        <input type="text" required="true" class="form-control" placeholder="Giá trị" name="maxval">
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-dollar
"></i>Đơn vị</label>
                        <select name="unit" class="custom-select form-control">
                            @foreach($unit as $un){
                                <option value="{{$un->id_DonVi}}">{{$un->TenDonVi}}</option>
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
                                <input type="text"  required="true" class="form-control" name="deadline" id="date" placeholder="Select value">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"><i class="la la-photo"></i>Ảnh bìa</label>
                    <div class="col-lg-9">
                        <div class="form-group">
                    <div class="input-group input-file" name="Fichier1">
                        <input type="text" required="true" name="photo" class="form-control" placeholder='Choose a file...' />
                    </div>
                </div>
            </div>
                </div>

                <div class="spacing">
                    <div class="request">
                        <div class="form-group green-border-focus">
                            <label><i class="la la-list-alt"></i>Yêu cầu</label>
                            <textarea class="form-control" id="exampleFormControlTextarea5" required="true" rows="5" name="require"></textarea>
                        </div>
                    </div>
                </div>
                <div class="spacing">
                    <div class="request">
                        <div class="form-group green-border-focus">
                            <label><i class="la la-paste"></i>Thủ tục nộp đơn</label>
                            <textarea class="form-control" id="exampleFormControlTextarea5" required="true" rows="5" name="pro"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <input  name="_token" type="hiden" value="{{ csrf_token() }}" style="visibility:hidden;">
                    <button class="btn btn-shadow mr-1 mb-2" type="reset">Reset</button>
                    <button class="btn btn-gradient-01" type="submit">Tạo</button>
                </div>
            </form>
        </div>