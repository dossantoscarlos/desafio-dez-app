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
        Schema::create('estrategia_wm_horario_prioridades', function (Blueprint $table) {
            $table->id('cd_estrategia_wms_horario_prioridade');
            $table->foreignId('cd_estrategia_wms')->constrained()->cascadeOnUpdate();
            $table->string('ds_horario_inicio');
            $table->string('ds_horario_final');
            $table->integer('nr_prioridade');
            $table->timestamps('dt_registro');
            $table->timestamps('dt_modificado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estrategia_wm_horario_prioridades');
    }
};
