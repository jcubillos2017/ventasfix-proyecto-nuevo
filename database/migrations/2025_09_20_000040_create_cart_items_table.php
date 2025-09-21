<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('sku',64);
            $table->string('nombre',150);
            $table->integer('cantidad');
            $table->integer('precio_neto');
            $table->integer('iva');
            $table->integer('precio_bruto');
            $table->integer('descuento_neto')->default(0);
            $table->integer('total_neto');
            $table->integer('total_bruto');
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->unique(['cart_id','product_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('cart_items');
    }
};
