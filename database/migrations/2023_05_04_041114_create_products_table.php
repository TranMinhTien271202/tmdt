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
            $table->string('name');
            $table->string('price');
            $table->tinyInteger('quantity');
            $table->text('info')->nullable();
            $table->longText('desc')->nullable();
            $table->string('sale')->nullable();
            $table->string('view');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('code_product');
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
