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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable();
            $table->string('stripe_id')->index()->nullable();
            $table->string('total')->nullable();
            $table->enum('status', ['open', 'close', 'pending'])->nullable();
            $table->integer('products_count')->default(1)->nullable();
            $table->enum('payment_status', ['paid', 'unpaid', 'open'])->default('open')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('name')->nullable();
            $table->string('cpf')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();
            $table->string('notes')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
