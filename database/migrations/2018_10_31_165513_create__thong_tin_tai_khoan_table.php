<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongTinTaiKhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThongTinTaiKhoan', function (Blueprint $table) {
            $table->integer('id_TaiKhoan');
			$table->string('HoVaTen');
			$table->date('NgaySinh');
			$table->string('SDT');
			$table->boolean('GioiTinh');
			$table->text('QueQuan');
			$table->text('DiaChi');
            $table->integer('id_TrangThai')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ThongTinTaiKhoan');
    }
}
