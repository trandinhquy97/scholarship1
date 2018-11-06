<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocBongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HocBong', function (Blueprint $table) {
            $table->increments('id_HocBong');
			$table->integer('id_NguoiDang');
			$table->dateTime('NgayTao');
			$table->text('AnhBia');
			$table->text('TenHocBong');
			$table->integer('id_LoaiHb');
			$table->date('deadline');
			$table->integer('id_TruongHoc');
			$table->integer('id_BacHoc');
			$table->integer('id_NganhHoc');
			$table->integer('id_GiaTriHb');
			$table->integer('SoLuong');
			$table->text('YeuCau');
			$table->text('ThuTucNop');
			$table->text('LinkDangKy');
			$table->text('NguonThongTin');
			$table->integer('SoLuotQuanTam');
			$table->integer('id_TrangThaiHb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HocBong');
    }
}
