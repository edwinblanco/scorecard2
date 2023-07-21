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
        Schema::create('top_3__c_a_j_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('auxiliar');
            $table->integer('cajas');
            $table->integer('unidades');
            $table->integer('sum_CJ_SENSIBLES')->nullable();
            $table->integer('sum_UND_SENSIBLES')->nullable();
            $table->integer('top');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_3__c_a_j_a_s');
    }
};
