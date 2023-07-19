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
        Schema::table('productividads', function (Blueprint $table) {
            $table->integer('sum_CJ_SENSIBLES')->nullable()->change();
            $table->integer('sum_UND_SENSIBLES')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productividads', function (Blueprint $table) {
            //
        });
    }
};
