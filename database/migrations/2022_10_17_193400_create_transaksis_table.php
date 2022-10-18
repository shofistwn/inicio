<?php

use App\Models\{
    User,
    Obat
};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Obat::class);
            $table->string('nama_penerima');
            $table->string('telepon');
            $table->integer('provinsi');
            $table->integer('kota');
            $table->string('alamat_detail');
            $table->string('no_resi')->nullable();
            $table->string('kode_pos');
            $table->string('jasa_ekspedisi');
            $table->string('harga_obat');
            $table->string('berat_obat');
            $table->string('jumlah_pesanan');
            $table->string('ongkos_kirim');
            $table->string('total_pembayaran');
            $table->enum('status_pembayaran', ['1', '2', '3', '4'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal')->default('1');
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
        Schema::dropIfExists('transaksi');
    }
}
