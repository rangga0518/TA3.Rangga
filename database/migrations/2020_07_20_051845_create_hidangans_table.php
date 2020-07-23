<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHidangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hidangan');
            $table->string('jenis_hidangan');
            $table->bigInteger('harga_hidangan');
            $table->string('foto_hidangan');
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
        Schema::dropIfExists('hidangans');
    }
}
