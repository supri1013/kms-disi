<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DokumenNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newdokumen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('penulis');
            $table->integer('kategori_id')->nullable();
            $table->date('tahun');
            $table->string('file');
            $table->integer('user_id');
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
        Schema::dropIfExists('newdokumen');
    }
}
