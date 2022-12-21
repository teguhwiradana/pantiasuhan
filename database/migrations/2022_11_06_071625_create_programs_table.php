<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{

    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('id_program');
            $table->string('nama_program');
            $table->integer('dns_butuh')->nullable();
            $table->integer('dns_terkumpul')->nullable();
            $table -> string('status') -> default('open');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
