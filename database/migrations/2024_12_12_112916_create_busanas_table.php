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
        Schema::create('busanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_busana');
            $table->decimal('harga');
            $table->text('deskripsi');
            $table->bigInteger('stok')->default(0);
            $table->string('gambar');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busanas');
    }
};
