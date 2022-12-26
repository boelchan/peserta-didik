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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->string('nama', 50);
            $table->string('alamat', 250);
            $table->string('ktp', 250)->nullable();
            $table->string('kk', 250)->nullable();
            $table->string('akte_kelahiran', 250)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->char('status', 10)->default('aktif');
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
        Schema::dropIfExists('santris');
    }
};
