<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEncyclopedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encyclopedia_article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('judul');
            $table->string('authors', 500);
            $table->text('encyclopedia');
            $table->date('tahun');
            $table->string('volume', 25)->nullable();
            $table->string('issue', 25)->nullable();
            $table->string('pages', 25)->nullable();
            $table->text('abstarct')->nullable();
            $table->text('tags')->nullable();
            $table->text('keywords')->nullable();
            $table->string('edition', 225);
            $table->text('publisher');
            $table->string('series_number', 225);
            $table->text('url')->nullable();
            $table->text('catalog_ids');
            $table->string('file', 225);
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
        Schema::dropIfExists('encyclopedia_article');
    }
}
