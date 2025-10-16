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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->string('category_slug', 50);
            $table->string('shortname', 100);
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('weight', 7, 2)->nullable();
            $table->decimal('weight_fee', 10, 2);
            $table->decimal('weight_price', 15, 2);
            $table->decimal('price', 15, 2);
            $table->string('unit', 20)->nullable();
            $table->string('tray', 20)->nullable();
            $table->string('status', 20)->default('ready'); // ['ready', 'on display', 'active', 'inactive', 'archived', 'sold', 'out of stock', 'buyback', 'sorted', 'cleaned']
            $table->text('description')->nullable();
            $table->string('barcode', 50)->nullable()->unique();
            $table->string('created_by', 20)->nullable(); // username dari auth user yang membuat
            $table->string('updated_by', 20)->nullable(); // username dari auth user yang melakukan update
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
