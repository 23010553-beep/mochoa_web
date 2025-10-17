<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete();      // carts.id
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete(); // products.id
            $table->unsignedInteger('qty')->default(1);
            $table->unsignedInteger('price'); // chốt giá lúc thêm
            $table->timestamps();

            $table->unique(['cart_id','product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
