<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelDokumens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('kategori_id');
            $table->text('judul_umum');
            $table->date('tahun');
            $table->string('volume');
            $table->string('isu');
            $table->string('halaman');
            $table->text('abstrak');
            $table->string('tag');
            $table->text('kata_kunci');
            $table->text('url');
            $table->string('nomor');
            $table->string('file');
            $table->string('penulis');
            $table->string('publikasi');
            $table->string('kota');
            $table->string('edisi');
            $table->string('editor');
            $table->string('publiser');
            $table->string('judul_khusus');
            $table->string('chapter');
            $table->string('counsel');
            $table->date('tanggal_putusan');
            $table->string('nomor_seri');
            $table->date('waktu_kejadian');
            $table->string('departemen');
            $table->string('universitas');
            $table->string('tipe');
            $table->string('institusi');
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
        Schema::dropIfExists('dokumens');
    }
}
