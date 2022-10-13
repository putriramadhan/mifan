<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdHargaPenginapanToTransaksiPenginapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_penginapan', function (Blueprint $table) {
            $table->foreignId('harga_penginapan')->after('id_tipe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_penginapan', function (Blueprint $table) {
            $table->dropColumn('harga_penginapan');
        });
    }
}
