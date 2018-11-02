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
			$table->string('AnhBia');
			$table->string('TenSuKien');
			$table->string('TieuDeBaiDang');
			$table->integer('id_LoaiSuKien');
			$table->integer('id_ThanhPho');
			$table->date('ThoiGianBatDauDangKy');
			$table->date('ThoiGianKetThucDangKy');
			$table->dateTime('ThoiGianBatDauSuKien');
			$table->dateTime('ThoiGianKetThucSuKien');
			$table->string('DiaDiem');
			$table->string('GiaiThuong');
			$table->string('NoiDung');
			$table->string('LinkDangKy');
			$table->string('NguonThongTin');
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
