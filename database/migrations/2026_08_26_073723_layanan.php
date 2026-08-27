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
    Schema::create('layanan', function (Blueprint $table) {
        $table->id()->primary;
        $table->string('nama');
        $table->text('deskripsi');
        $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
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
