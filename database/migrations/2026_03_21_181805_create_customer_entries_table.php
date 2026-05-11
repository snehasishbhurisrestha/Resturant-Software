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
        Schema::create('customer_sessions', function (Blueprint $table) {
            $table->id();

            $table->string('customer_name');
            $table->string('customer_phone');

            $table->unsignedBigInteger('restaurant_id');
            $table->decimal('entry_fee', 10, 2)->default(0);
            $table->decimal('used_amount', 10, 2)->default(0);
            $table->decimal('remaining_amount', 10, 2)->default(0);

            $table->unsignedBigInteger('table_id')->nullable();

            $table->enum('status', ['active', 'closed'])->default('active');

            $table->string('qr_code')->nullable();

            $table->unsignedBigInteger('created_by');

            $table->timestamps();

            // Foreign keys (optional but recommended)
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('tables')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_entries');
    }
};
