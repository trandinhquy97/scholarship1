<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhLuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BinhLuan', function (Blueprint $table) {
            $table->increments('id_BinhLuan');
			$table->integer('id_DanhMucBinhLuan');
			$table->integer('id_TaiKhoan');
			$table->dateTime('ThoiGian');
			$table->string('NoiDung');
			$table->boolean('DaChinhSua');
			$table->integer('id_BinhLuanGoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BinhLuan');
    }
}
