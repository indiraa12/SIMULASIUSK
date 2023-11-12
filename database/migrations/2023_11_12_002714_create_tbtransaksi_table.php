<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbtransaksi', function (Blueprint $table) {
            $table->bigIncrements('idtransaksi');
            $table->bigInteger('idkasir')->unsigned();
            $table->foreign('idkasir')->references('idkasir')->on('tbkasir')->onDelete('cascade');
            $table->bigInteger('idbarang')->unsigned();
            $table->foreign('idbarang')->references('idbarang')->on('tbbarang')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('totalbayar');
            $table->dateTime('tgltransaksi');
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
        Schema::dropIfExists('tbtransaksi');
    }
};
