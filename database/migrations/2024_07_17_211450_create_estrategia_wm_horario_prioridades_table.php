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
        Schema::create('estrategia_wms_horario_prioridades', function (Blueprint $table) {
            $table->id('cd_estrategia_wms_horario_prioridade');
            $table->foreignId('cd_estrategia_wms')->references('cd_estrategia_wms', 'cd_estrategia_wms')
                ->on('estrategia_wms')
                ->cascadeOnUpdate();
            $table->string('ds_horario_inicio');
            $table->string('ds_horario_final');
            $table->integer('nr_prioridade');
            $table->timestamp('dt_registro')->default(now());
            $table->timestamp('dt_modificado')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estrategia_wms_horario_prioridades');
    }
};
