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

        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('busana_id');
            $table->foreign('busana_id')->references('id')->on('busanas')->onDelete('cascade');
            $table->integer('bulan');
            $table->bigInteger('tahun');
            $table->integer('total_pesanan')->default(0);
            $table->decimal('total_penjualan', 15, 2)->default(0);
            $table->dateTime('created_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
