<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('promotor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedSmallInteger('vereda_id');
            $table->string('vereda_nombre', 120);
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->string('paciente', 120);
            $table->string('tipo_servicio', 80);
            $table->string('direccion_referencia', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('urgencia', 20)->default('media');
            $table->unsignedTinyInteger('prioridad')->default(1);
            $table->string('estado', 20)->default('pendiente');
            $table->date('fecha_programada')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['estado', 'prioridad']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
