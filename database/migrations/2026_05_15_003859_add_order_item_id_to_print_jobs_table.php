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
        Schema::table('print_jobs', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | ORDER ITEM
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('order_item_id')
                ->nullable()
                ->after('order_id');

            /*
            |--------------------------------------------------------------------------
            | INDEX
            |--------------------------------------------------------------------------
            */

            $table->index('order_item_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('print_jobs', function (Blueprint $table) {

            $table->dropIndex(['order_item_id']);

            $table->dropColumn('order_item_id');
        });
    }
};