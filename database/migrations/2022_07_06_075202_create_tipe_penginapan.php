<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipePenginapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_penginapan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('gambar',50);
            $table->text('deskripsi');
            $table->text('harga');
            $table->string('slug', 50);
            $table->enum('status',['1','2']);
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
        Schema::dropIfExists('tipe_penginapan');
    }
}
