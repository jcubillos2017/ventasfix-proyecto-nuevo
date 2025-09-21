<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('status',['draft','confirmed','invoiced','cancelled'])->default('confirmed');
            $table->integer('subtotal_neto');
            $table->integer('iva');
            $table->integer('total_bruto');
            $table->char('moneda',3)->default('CLP');
            $table->string('softland_doc_ref',64)->nullable();
            $table->timestamps();
            $table->unique('cart_id');
        });
    }
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
