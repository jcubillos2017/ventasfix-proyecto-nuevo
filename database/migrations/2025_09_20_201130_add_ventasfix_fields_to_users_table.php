<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users','rut'))      $table->string('rut',20)->after('id');
            if (!Schema::hasColumn('users','nombre'))   $table->string('nombre',100)->after('rut');
            if (!Schema::hasColumn('users','apellido')) $table->string('apellido',100)->after('nombre');
            // ya existe 'email' y 'password' en la tabla por defecto
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users','rut'))      $table->dropColumn('rut');
            if (Schema::hasColumn('users','nombre'))   $table->dropColumn('nombre');
            if (Schema::hasColumn('users','apellido')) $table->dropColumn('apellido');
        });
    }
};
