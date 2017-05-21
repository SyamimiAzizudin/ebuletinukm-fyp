<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tajuk');
            $table->text('huraian');
            $table->timestamp('masaMula');
            $table->timestamp('masaAkhir')->nullable();
            $table->string('lokasi');
            $table->string('kumpulan_sasaran');
            $table->string('max_peserta');
            $table->string('penganjur');
            $table->string('telephone');
            $table->string('gambar')->nullable();
            $table->boolean("is_published")->default(false);
            $table->integer('user_id')->index()->unsigned();
            $table->timestamps();
            $table->timestamp('expired_at')->nullable();

            //foreign key
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
        Schema::dropIfExists('events');
    }
}
