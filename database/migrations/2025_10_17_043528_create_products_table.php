<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void {
  Schema::create('products', function (Blueprint $t) {
    $t->id();
    $t->foreignId('category_id')->constrained()->cascadeOnDelete();
    $t->string('name');
    $t->string('code')->unique()->nullable(); // mã sp (VD: DH259)
    $t->string('image')->nullable();
    $t->unsignedInteger('price');            // giá theo VND
    $t->unsignedInteger('sale_price')->nullable(); // giá khuyến mại
    $t->text('description')->nullable();
    $t->timestamps();
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
