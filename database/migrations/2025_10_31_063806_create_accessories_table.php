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
        Schema::create('accessories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('category', 50);
            $table->string('slug', 50);
            $table->string('varian', 50)->nullable();
            $table->string('color', 50)->nullable()->comment('keterangan ini diperlukan terutama untuk gems');
            $table->string('warna', 50)->nullable()->comment('keterangan ini diperlukan terutama untuk gems');
            $table->string('name', 50)->nullable();
            $table->string('localname', 50)->nullable();
            $table->tinyInteger('opacity')->nullable()->comment('0=>transparent,1=>dense,0.5=>semi-transparent');
            $table->string('codename', 20)->nullable()->unique();
            $table->string('description')->nullable();
            $table->string('barcode', 3)->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories');
    }
};
