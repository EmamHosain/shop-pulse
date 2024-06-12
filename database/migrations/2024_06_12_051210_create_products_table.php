<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->index();
            $table->string('title', 255)->unique();
            $table->text('slug');
            $table->integer('quantity');
            $table->text('short_description');
            $table->longText('long_description');

            $table->boolean('published')->default(0);
            $table->boolean('inStock')->default(0);
            $table->integer('stock_count');

            $table->float('price',2);
            $table->integer('discount_percentage')->default(0);
            $table->float('discount_price',2)->default(0);

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict')->onUpdate('cascade');
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
