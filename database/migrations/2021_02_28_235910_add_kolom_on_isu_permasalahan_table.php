<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKolomOnIsuPermasalahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('isu_permasalahan', function (Blueprint $table) {
            //
        $table->string('kluster')->after('id');
        $table->string('aplikasi', 225)->after('kluster');
        $table->date('tanggal')->after('aplikasi');
        $table->time('jam_mulai')->after('tanggal');
        $table->time('jam_selesai')->after('jam_mulai');
        $table->string('menu_aplikasi', 225)->nullable()->after('jam_selesai');
        $table->longText('kendala')->after('menu_aplikasi');
        $table->longText('solusi')->nullable()->after('kendala');
        $table->longText('detail')->nullable()->after('solusi');
        $table->string('no_tiket', 225)->after('detail');
        $table->string('status', 225)->after('no_tiket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('isu_permasalahan', function (Blueprint $table) {
            //
        });
    }
}
