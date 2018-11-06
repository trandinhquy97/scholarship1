<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaTriHocBongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiaTriHocBong', function (Blueprint $table) {
            $table->increments('id_GiaTriHb');
			$table->integer('PhanTramHb');
			$table->integer('SoTienMin');
			$table->integer('SoTienMax');
			$table->integer('id_DonViTien');
			$table->text('MoTa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GiaTriHocBong');
    }
}
