<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinaansTable extends Migration
{
    public function up()
    {
        Schema::create('binaans', function (Blueprint $table) {
            $table->id('id_binaan');
            $table->string('nama_binaan');
            $table->string('ttl');
            $table->string('jekel');
            $table->string('pendidikan');
            $table->string('umur');
            $table->string('kelas');
            $table->string('status');
            $table->string('domisili');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('binaans');
    }
}
