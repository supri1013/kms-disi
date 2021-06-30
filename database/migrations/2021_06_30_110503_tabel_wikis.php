<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelWikis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('deskripsi');
            $table->text('isi_artikel');
            $table->string('gambar');
            $table->text('editor');
            $table->text('sumber');
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
        Schema::dropIfExists('wikis');
    }
}
