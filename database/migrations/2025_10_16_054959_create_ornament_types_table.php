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
        Schema::create('ornament_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('localname', 50)->nullable();
            $table->string('slug', 50)->unique();
            $table->text('description')->nullable();
            $table->string('barcode', 2)->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ornament_types');
    }
};
