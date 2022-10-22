<?php

use App\Models\{
    User,
    Product
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
            $table->foreignIdFor(Product::class);
            $table->string('no_resi')->nullable();
            $table->string('jasa_ekspedisi');
            $table->integer('jumlah_pesanan');
            $table->string('subtotal');
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
