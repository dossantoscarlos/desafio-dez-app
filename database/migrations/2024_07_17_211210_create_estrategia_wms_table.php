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
        Schema::create('estrategia_wms', function (Blueprint $table) {
            $table->string('ds_estrategia_wms');
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
        Schema::dropIfExists('estrategia_wms');
    }
};
