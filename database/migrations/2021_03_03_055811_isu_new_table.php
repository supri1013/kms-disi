<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IsuNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newisu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kluster');
            $table->string('aplikasi');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('menu_aplikasi');
            $table->text('kendala');
            $table->text('solusi')->nullable();
            $table->text('detail')->nullable();
            $table->string('no_tiket');
            $table->string('status');
            $table->integer('user_id');
            $table->integer('kategori_id')->nullable();
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
        Schema::dropIfExists('newisu');
    }
}
