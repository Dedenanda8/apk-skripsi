<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BarangmasukMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Masuk',function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Suplier_id');
            $table->unsignedBigInteger('Barang_id');
            $table->foreign('Suplier_id')->references('id')->on('Suplier')->onDelete('cascade');
            $table->foreign('Barang_id')->references('id')->on('Barang')->onDelete('cascade');
            $table->date('tgl_masuk');
            $table->string('jumlah_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Masuk');
    }
}