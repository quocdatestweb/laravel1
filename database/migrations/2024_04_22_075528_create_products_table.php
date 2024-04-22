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
            $table->string('Name');
            $table->string('ThumbImage');
            $table->decimal('Price', 8, 2);
            $table->text('Content');
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('Author_ID');
            $table->string('Author_Type');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('CategoryID')->references('id')->on('product_categories');
            $table->foreign('Author_ID')->references('id')->on('users');
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
