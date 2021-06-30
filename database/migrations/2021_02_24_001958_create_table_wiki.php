<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWiki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul', 225);
            $table->longText('isi_artikel');
            $table->string('gambar', 225)->nullable();
            $table->longText('link')->nullable();
            $table->longText('sumber');
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
        Schema::dropIfExists('wiki');
    }
}
