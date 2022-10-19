<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('slug');
            $table->string('foto');
            $table->string('nama');
            $table->string('kategori');
            $table->integer('stok');
            $table->string('harga');
            $table->string('deskripsi');
            $table->string('dosis');
            $table->string('aturan_pakai');
            $table->string('manufaktur');
            $table->string('berat');
            $table->string('no_registrasi');
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
        Schema::dropIfExists('obat');
    }
}
