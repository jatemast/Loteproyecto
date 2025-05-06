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
        Schema::create('labor_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('clasificacion');
    $table->integer('item');
    $table->string('descripcion');
    $table->string('unidad_medida');
    $table->decimal('valor_prefijado_a', 12, 2)->nullable();
    $table->decimal('valor_prefijado_b', 12, 2)->nullable();
    $table->string('definicion')->nullable();
    $table->integer('cantidad')->nullable();
    $table->decimal('valor_total', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labor_tasks');
    }
};
