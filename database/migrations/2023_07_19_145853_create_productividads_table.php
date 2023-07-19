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
        Schema::create('productividads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('auxiliar');
            $table->integer('cajas');
            $table->integer('unidades');
            $table->integer('sum_CJ_SENSIBLES')->nullable();
            $table->integer('sum_UND_SENSIBLES')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productividads');
    }
};
