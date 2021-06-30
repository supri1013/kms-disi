<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WikiNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newwiki', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->text('isi_artikel');
            $table->string('gambar')->nullable();
            $table->text('link')->nullable();
            $table->text('sumber');
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
        Schema::dropIfExists('newwiki');
    }
}
