<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_restoran')->unsigned();
            // $table->bigInteger('id_user')->unsigned();
            // $table->bigInteger('id_hidangan')->unsigned();       
            // $table->bigInteger('jumlah_pesanan');       
            // $table->string('status_pemesanan');
            $table->timestamps();

            // $table->foreign('id_restoran')->references('id')->on('restorans')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_hidangan')->references('id')->on('hidangans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
