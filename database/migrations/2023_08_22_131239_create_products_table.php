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
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('value');
            $table->enum('status', ['active', 'disable']);
            $table->integer('quantity')->nullable();
            $table->integer('min_quantity')->default(1);
            $table->integer('max_quantity')->nullable();
            $table->string('description');
            $table->json('description_services');
            $table->string('promotion')->nullable();
            $table->timestamp('end_of_promotion')->nullable();
            $table->string('stripe_prod');
            $table->string('partner')->nullable();
            $table->string('img')->nullable();
            $table->string('category');
            $table->enum('type', ['subscription', 'payment']);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
