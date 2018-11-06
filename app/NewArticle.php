<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewArticle extends Model
{
    protected $table = "hocbong";

    protected $fillable = [
        'id_HocBong','id_NguoiDang','NgayTao','AnhBia','TenHocBong','id_LoaiHb','deadline','id_TruongHoc','id_BacHoc','id_NganhHoc','id_GiaTriHb','SoLuong','YeuCau', 'ThuTucNop','LinkDangKy',	'NguonThongTin','id_MucBinhLuan', 'SoLuotQuanTam','id_TrangThaiHb'
    ];
}
