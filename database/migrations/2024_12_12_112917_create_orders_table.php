<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('customers');
            $table->dateTime('tanggal_pesan');
            $table->decimal('total_belanja');
            $table->enum('pengiriman', ["Standar","Cepat","Ambil Di Tempat"]);
            $table->enum('pembayaran', ["COD","Bank"]);
            $table->enum('status_pesanan', ["Pending","Diproses","Dikemas","Selesai"]);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
