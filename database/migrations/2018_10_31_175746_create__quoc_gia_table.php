<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuocGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QuocGia', function (Blueprint $table) {
            $table->increments('id_QuocGia');
			$table->string('TenQuocGia');
			$table->string('AnhQuocKy');
			$table->integer('id_KhuVuc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('QuocGia');
    }
}
