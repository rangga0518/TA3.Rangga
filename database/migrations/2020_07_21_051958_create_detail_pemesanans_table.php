<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pemesanan')->unsigned();
            $table->bigInteger('id_hidangan')->unsigned();
            $table->bigInteger('jumlah_hidangan');
            $table->bigInteger('total_harga_hidangan');
            $table->timestamps();

            $table->foreign('id_pemesanan')->references('id')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_hidangan')->references('id')->on('hidangans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemesanans');
    }
}
