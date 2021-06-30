<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIsuhardware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isu_hardware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hardaware')->default('text');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable();
            $table->time('lama')->nullable();
            $table->string('kode')->nullable()->default('text');
            $table->string('nama_hardware')->default('text');
            $table->string('pelapor')->default('text');
            $table->text('nama_permasalahan')->default('text');
            $table->string('status')->default('text');
            $table->text('detail_permasalahan')->default('text');
            $table->string('nomor_tiket')->nullable();
            $table->text('penyelesaian')->nullable()->default('text');
            $table->integer('user_id')->unsigned()->default(12);
            $table->integer('jenis_id')->unsigned()->default(12);
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
        Schema::dropIfExists('isu_hardware');
    }
}
