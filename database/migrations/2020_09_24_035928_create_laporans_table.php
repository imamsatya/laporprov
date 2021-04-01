<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
           $table->id();
            // $table->string('judul');
            $table->string('siapa');
            $table->text('laporan');
            $table->text('jawaban')->nullable();
            $table->string('status')->nullable();
            $table->boolean('anonim')->nullable();
            $table->boolean('rahasia')->nullable();
            $table->timestamps();
        });

          Schema::table('laporans', function (Blueprint $table){
            $table->integer('kabupaten_kota_id')->unsigned()->nullable();
            $table->foreign('kabupaten_kota_id')->references('id')->on('kabupatens');
            
        });

          Schema::table('laporans', function (Blueprint $table){
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
