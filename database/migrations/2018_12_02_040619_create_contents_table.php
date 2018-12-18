<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
          //judul,slug,konten,gambar,lokasi,gambar,video,user_id
            $table->increments('id');
            $table->string('judul',100);
            $table->string('slug',120);
            $table->text('subject');
            $table->string('gambar',200)->nullable();
            $table->string('kategori',50);
            $table->string('video',200)->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('jenis',20);
            $table->timestamps();

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
        Schema::dropIfExists('contents');
    }
}
