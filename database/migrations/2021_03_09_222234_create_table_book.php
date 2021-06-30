<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('judul');
            $table->string('authors', 500);
            $table->text('publication');
            $table->date('tahun');
            $table->string('volume', 25)->nullable();
            $table->string('issue', 25)->nullable();
            $table->string('pages', 25)->nullable();
            $table->text('abstract')->nullable();
            $table->text('tags')->nullable();
            $table->text('keywords')->nullable();
            $table->string('city', 225);
            $table->string('edition', 225);
            $table->string('editors', 500);
            $table->text('publisher');
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
        Schema::dropIfExists('book');
    }
}
