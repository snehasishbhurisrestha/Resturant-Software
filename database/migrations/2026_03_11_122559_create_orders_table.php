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

            $table->foreignId('restaurant_id')->constrained()->cascadeOnDelete();

            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->foreignId('table_id')->constrained()->cascadeOnDelete();
            $table->enum('order_type', ['Dine In'])->nullable()->default('Dine In');

            $table->foreignId('created_by')->constrained('users');

            $table->string('status')->default('pending');

            $table->decimal('my_amount',15,2)->default(0);
            $table->decimal('tax',15,2)->default(0);
            $table->decimal('discount',15,2)->default(0);
            $table->decimal('grand_total',15,2)->default(0);
            $table->decimal('round_off',15,2)->default(0);
            $table->string('payment')->nullable();

            $table->timestamps();
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
