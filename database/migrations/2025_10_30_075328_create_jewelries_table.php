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
        Schema::create('jewelries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ornament_id')->nullable()->constrained('ornaments')->onDelete('set null');
            $table->string('ornament_type', 50);
            $table->string('ornament_varian', 100);
            $table->string('gold_color');
            $table->decimal('gold_purity', 5, 2);
            $table->string('shortname', 200);
            $table->string('annotation', 50);
            $table->string('name', 255);
            $table->smallInteger('year')->nullable();
            $table->string('edition', 50)->nullable();
            $table->tinyInteger('condition')->default(99)->comment('1-100 scale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewelries');
    }
};
