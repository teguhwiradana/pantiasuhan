<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id('id_donatur');
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->foreign('id_pengguna')->references('id')->on('users');
            $table->unsignedBigInteger('id_bank')->nullable();
            $table->foreign('id_bank')->references('id_bank')->on('banks');
            $table->unsignedBigInteger('id_program')->nullable();
            $table->foreign('id_program')->references('id_program')->on('programs');
            $table->string('name');
            $table->date('tgl_donasi');
            $table->string('alamat');
            $table->bigInteger('nominal');
            $table->string('atas_nama')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('no_rekening',25)->nullable();
            $table->string('keterangan')->nullable();
            $table->string('bukti_tf')->nullable();
            $table->string('status')->default('proses');
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
        Schema::dropIfExists('donaturs');
    }
}