<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruongHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TruongHoc', function (Blueprint $table) {
            $table->increments('id_TruongHoc');
			$table->string('TenTruongHoc');
			$table->string('logo');
			$table->string('ThongTin');
			$table->integer('id_ThanhPho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TruongHoc');
    }
}
