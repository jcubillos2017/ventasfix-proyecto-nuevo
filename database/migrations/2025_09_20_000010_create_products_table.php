<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku',64)->unique();
            $table->string('nombre',150);
            $table->string('desc_corta',255);
            $table->text('desc_larga');
            $table->string('imagen_url');
            $table->integer('precio_neto');
            $table->integer('precio_venta');
            $table->integer('stock_actual');
            $table->integer('stock_minimo');
            $table->integer('stock_bajo');
            $table->integer('stock_alto');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
