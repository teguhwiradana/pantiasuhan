<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBank extends Migration
{
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id('id_bank');
            $table->String('nama_bank', 25);
            $table->String('nama_rekening')->nullable();
            $table->String('norekening')->nullable();
            $table->String('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
