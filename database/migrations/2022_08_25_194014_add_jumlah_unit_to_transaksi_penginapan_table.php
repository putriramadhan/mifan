<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJumlahUnitToTransaksiPenginapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_penginapan', function (Blueprint $table) {
            $table->foreignId('jumlah_unit')->after('jumlah_hari');
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
            $table->dropColumn('jumlah_unit');
        });
    }
}
