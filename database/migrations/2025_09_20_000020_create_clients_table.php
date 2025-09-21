<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('rut_empresa',20)->unique();
            $table->string('rubro',100);
            $table->string('razon_social',150);
            $table->string('telefono',50);
            $table->string('direccion',255);
            $table->string('contacto_nombre',100);
            $table->string('contacto_email',150);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('clients');
    }
};
