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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // 🔗 Restaurant (multi-tenant ready)
            $table->foreignId('restaurant_id')->nullable()->constrained()->cascadeOnDelete();

            // 👤 Basic Info
            $table->string('name');
            $table->string('phone')->index(); // important for search
            $table->string('email')->nullable();

            // 🧾 Optional Profile Info
            $table->date('dob')->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();

            // 🔐 Extra
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
