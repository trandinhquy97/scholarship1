<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuKienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SuKien', function (Blueprint $table) {
            $table->increments('id_SuKien');
			$table->integer('id_NguoiDang');
			$table->dateTime('NgayTao');
			$table->text('AnhBia');
			$table->text('TenSuKien');
			$table->text('TieuDeBaiDang');
			$table->integer('id_LoaiSuKien');
			$table->integer('id_ThanhPho');
			$table->date('ThoiGianBatDauDangKy');
			$table->date('ThoiGianKetThucDangKy');
			$table->dateTime('ThoiGianBatDauSuKien');
			$table->dateTime('ThoiGianKetThucSuKien');
			$table->text('DiaDiem');
			$table->text('GiaiThuong');
			$table->text('NoiDung');
			$table->text('LinkDangKy');
			$table->text('NguonThongTin');
			$table->integer('id_MucBinhLuan');
			$table->integer('SoLuotQuanTam');
			$table->integer('id_TrangThaiTopic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SuKien');
    }
}
