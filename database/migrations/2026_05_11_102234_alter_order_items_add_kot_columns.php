<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {

            $table->unsignedBigInteger('kot_id')
                ->nullable()
                ->after('order_id');

            $table->boolean('is_kot_printed')
                ->default(0)
                ->after('is_complimentary');

            $table->timestamp('kot_printed_at')
                ->nullable()
                ->after('is_kot_printed');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {

            $table->dropColumn([
                'kot_id',
                'is_kot_printed',
                'kot_printed_at'
            ]);

        });
    }
};
