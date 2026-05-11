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
        Schema::table('order_items', function (Blueprint $table) {
            $table->text('price_update_reason')
                  ->nullable()
                  ->after('note');

            $table->unsignedBigInteger('price_updated_by')
                  ->nullable()
                  ->after('price_update_reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn([
                'price_update_reason',
                'price_updated_by'
            ]);
        });
    }
};
