<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
    Schema::create('antrian', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pengunjung_id');
        $table->unsignedBigInteger('layanan_id');
        $table->foreign('pengunjung_id')->references('id')->on('pengunjung')->onDelete('cascade');
        $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
        $table->integer('no_antrian');
        $table->string('tujuan');
        $table->enum('status',['menunggu','dilayani','selesai', 'batal'])->default('menunggu');
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
        //
    }
};
