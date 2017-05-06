<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembacas', function (Blueprint $table) {
            $table->increments('id');                                       
            $table->integer('user_id')->index()->unsigned();
            $table->string('nama')->nullable();
            $table->string('telefon')->nullable();
            $table->string('fakulti')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('persatuan')->nullable();
            $table->string('gambar')->default('img/image-placeholder2.jpg');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembacas');
    }
}
